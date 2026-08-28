<?php
header("Content-Type: application/json; charset=utf-8");
header("Access-Control-Allow-Origin: *");

// diretorios no sinergias
//require __DIR__ . "/../../tmp/conf_plos.php";
//require __DIR__ . "/../../tmp/conf_utils.php";
//require __DIR__ . "/../../tmp/conf_sessao.php";

// diretorios no hostgator
if (isset($_GET["endpoint"])) // vem de uma chamada https://cientistaspatentes.com.br/apiphp/api.php?endpoint=processo&numero=BR102014022058-5
{
	require("../conf_sessao.php");
	require("../../conf_plos.php");
	require("../conf_utils.php");
}
else // vem de uma chamada https://cientistaspatentes.com.br/apiphp/endpoints/processo.php?numero=BR102014022058-5
{
	require("../../conf_sessao.php");
	require("../../../conf_plos.php");
	require("../../conf_utils.php");
}
	
ini_set('display_errors', 1);
error_reporting(E_ALL);	

// https://sinergias.inpi.gov.br/apiphp/processo.php?numero=BR102014022058-5
// https://sinergias.inpi.gov.br/apiphp/api.php?endpoint=processo&numero=BR102014022058-5
// https://cientistaspatentes.com.br/apiphp/endpoints/processo.php?numero=BR102014022058-5
// https://cientistaspatentes.com.br/apiphp/api.php?endpoint=processo&numero=BR102014022058-5

// https://cientistaspatentes.com.br/apiphp/endpoints/processo.php?numero=BR102014022058-5
// https://cientistaspatentes.com.br/apiphp/api.php?endpoint=processo&numero=BR102014022058-5

/*
Ferramenta 1: Consultar CEP (já existe)
Nome: ConsultaCEP
URL: https://cientistaspatentes.com.br/apiphp/endpoints/cep.php?cep={cep}
Método: GET
Autenticação: Nenhuma

Ferramenta 2: Consultar Processo (criar nova)
Nome: ConsultaProcesso
URL: https://cientistaspatentes.com.br/apiphp/endpoints/processo.php?numero={numero}
Método: GET
Autenticação: Nenhuma
*/


if (!isset($_GET["numero"])) {
    http_response_code(400);
    echo json_encode([
        "erro" => true,
        "mensagem" => "Informe o parâmetro numero."
    ], JSON_UNESCAPED_UNICODE);
    exit;
}

// Mantém apenas números
$numero = limpar_numero($_GET["numero"]);
$numero = preg_replace('/^BR/i', '', $numero);
$numero = preg_replace('/-.*/', '', $numero);

if (strlen($numero) != 9 && strlen($numero) != 12) 
{
    http_response_code(400);
    echo json_encode([
        "erro" => true,
        "mensagem" => "Número inválido $numero."
    ], JSON_UNESCAPED_UNICODE);
    exit;
}

$valido = true;
/*
if (identificado_pi($numero))
    echo "Identificado patente de invenção \n";
elseif (identificado_mu($numero))
    echo "Identificado modelo de utilidade \n";
elseif (identificado_ca($numero))
    echo "Identificado certificado de adição \n";
elseif (identificado_pipeline($numero))
    echo "Identificado patente de invenção \n";
else
{
    //echo "Natureza do pedido não identificada \n";
    $valido = false;
}
*/

if (
    !identificado_pi($numero) &&
    !identificado_mu($numero) &&
    !identificado_ca($numero) &&
    !identificado_pipeline($numero)
) {
    $valido = false;
}

//echo $numero."\n";
if ($valido==false)
{
    http_response_code(400);
    echo json_encode([
        "erro" => true,
        "mensagem" => "Natureza do pedido não identificada $numero."
    ], JSON_UNESCAPED_UNICODE);
    exit;
}

//echo "Prosseguindo exame... \n";

$numero1 = $numero;
$numero2 = $numero;
$stmt2 = $pdo->prepare("
    SELECT *
    FROM pimupi
    WHERE numero1 = :numero
        OR numero2 = :numero LIMIT 1
");
$stmt2->execute([':numero' => $numero]);
if ($line2 = $stmt2->fetch(PDO::FETCH_ASSOC))
{
    $numero1 = $line2["numero1"];
    $numero2 = $line2["numero2"];
}

$peticoes = [];
$resposta = false;
$tipos = [200, 207, 210, 214, 260, 281];
$sql2 = "SELECT * FROM despachos_pag WHERE numero = :numero1 OR numero = :numero2 order by data_peticao asc";
$stmt2 = $pdo->prepare($sql2);
$stmt2->execute([':numero1' => $numero1, ':numero2' => $numero2]);
//echo "$numero \n";
while ($line2 = $stmt2->fetch(PDO::FETCH_ASSOC))
{
    $peticao = $line2['peticao'];
    $tipo_peticao = (int)$line2['tipo_peticao'];
    if (in_array($tipo_peticao, $tipos)) 
    {
        $resposta = true;
        $cd_imagem = $line2['cd_imagem'];
        $data_peticao = $line2['data_peticao'];
        $numnossonumero = $line2['numnossonumero'];
        $tipo = $line2['tipo_peticao'];
        $data_formatada = normalizaData($data_peticao);
        //echo "peticao='$peticao' tipo_peticao=$tipo_peticao data_peticao='$data_formatada' cd_imagem=$cd_imagem \n";
        $peticoes[] = [
            "peticao"       => $peticao,
            "tipo_peticao"  => $tipo_peticao,
            "data_peticao"  => $data_formatada,
            "cd_imagem"     => $cd_imagem,
			"sharepoint"	=> "https://inpigovbr.sharepoint.com/Shared%20Documents/peticoes/{$numero}_{$numnossonumero}_{$tipo}.pdf?web=1"
        ];
    }
}

if ($resposta === false) {
    http_response_code(200);
    echo json_encode([
		"numero" => $numero,
		"quantidade" => 0,
		"peticoes" => [],
        "erro" => true,
        "mensagem" => "Não foi possível identificar nenhuma petição."
    ], JSON_UNESCAPED_UNICODE);
    exit;
}

$dadosRetorno = [
    "numero" => $numero,
    "quantidade" => count($peticoes),
    "peticoes" => $peticoes
];

echo json_encode($dadosRetorno, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

exit();

?>

