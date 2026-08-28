<?php
header("Content-Type: application/json; charset=utf-8");
header("Access-Control-Allow-Origin: *");

// diretorios no sinergias
//require __DIR__ . "/../../tmp/conf_plos.php";
//require __DIR__ . "/../../tmp/conf_utils.php";
//require __DIR__ . "/../../tmp/conf_sessao.php";

// diretorios no hostgator
if (isset($_GET["endpoint"])) // vem de uma chamada https://cientistaspatentes.com.br/apiphp/api.php?endpoint=publica&numero=BR102014022058-5
{
	require("../conf_sessao.php");
	require("../../conf_plos.php");
	require("../conf_utils.php");
}
else // vem de uma chamada https://cientistaspatentes.com.br/apiphp/endpoints/publica.php?numero=BR102014022058-5
{
	require("../../conf_sessao.php");
	require("../../../conf_plos.php");
	require("../../conf_utils.php");
}
	
ini_set('display_errors', 1);
error_reporting(E_ALL);	

// https://sinergias.inpi.gov.br/apiphp/publica.php?numero=BR102014022058-5
// https://sinergias.inpi.gov.br/apiphp/api.php?endpoint=publica&numero=BR102014022058-5
// https://cientistaspatentes.com.br/apiphp/endpoints/publica.php?numero=BR102014022058-5
// https://cientistaspatentes.com.br/apiphp/api.php?endpoint=publica&numero=BR102014022058-5

// https://cientistaspatentes.com.br/apiphp/endpoints/publica.php?numero=BR102014022058-5
// https://cientistaspatentes.com.br/apiphp/api.php?endpoint=publica&numero=BR102014022058-5

/*
Ferramenta 1: Consultar CEP 
Nome: ConsultaCEP
URL: https://cientistaspatentes.com.br/apiphp/endpoints/cep.php?cep={cep}
Método: GET
Autenticação: Nenhuma

Ferramenta 2: Consultar Processo 
Nome: ConsultaProcesso
URL: https://cientistaspatentes.com.br/apiphp/endpoints/processo.php?numero={numero}
Método: GET
Autenticação: Nenhuma

Ferramenta 3: Consultar Publicacao 
Nome: ConsultaPublicacao
URL: https://cientistaspatentes.com.br/apiphp/endpoints/publica.php?numero={numero}
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

$publicacoes = [];
$resposta = false;
$tipos = ['6.1', '7.1', '9.1', '9.2', 'PR - Recursos', 'PR - Nulidades'];
$sql2 = "SELECT * FROM arquivados WHERE numero = :numero1 OR numero = :numero2 order by data asc";
$stmt2 = $pdo->prepare($sql2);
$stmt2->execute([':numero1' => $numero1, ':numero2' => $numero2]);
//echo "$numero \n";
while ($line2 = $stmt2->fetch(PDO::FETCH_ASSOC))
{
    $resposta = true;
	$despacho = $line2['despacho'];
    $data = $line2['data'];
    $divisao = $line2['divisao'];
    $anulado = $line2['anulado'];
	$str_anulado = '';
	if ($anulado>0) $str_anulado = "Publicação anulada/prejudicada na RPI $anulado";
	$prmexame = (int)$line2['prmexame'];
    if (in_array($despacho, $tipos)) 
	{
		$codigo = 0;
		if ($despacho=='6.1') $decisao = "'exigencia'";
		if ($despacho=='7.1') $decisao = "'ciencia de parecer'";
		if ($despacho=='9.1') $decisao = "'deferimento','defanvisa'";
		if ($despacho=='9.2') $decisao = "'indeferimento','9.2'";
		if ($despacho=='PR - Recursos') $decisao = "'recurso provido','recurso ciencia','recurso negado','recurso exigencia','recurso provido anvisa','recurso anvisa','recurso artigo 34','anvisacgrec','artigo 34','recurso provido-devolucao 100.2','recurso provido-reforma 100.1','recurso exigencia 121','recurso manutencao do indeferimento 111'";
		if ($despacho=='PR - Nulidades') $decisao = "'nulidade negada','nulidade parcial','nulidade provida','nulidade 1'";
		
		$sql3 = "SELECT * FROM pedido WHERE (numero = '$numero1' OR numero = '$numero2') and rpi='$data' and decisao in ($decisao)";
		$res3 = mysqli_query($link,$sql3);
		if ($line3=@mysqli_fetch_assoc($res3)) $codigo = $line3['codigo'];
		
		//$cmd3 = "SELECT * FROM pedido WHERE (numero = '$numero1' OR numero = '$numero2') and rpi='$data' and decisao in ($decisao)";
		//echo $cmd3."<BR>";
		$sharepoint = "";
		if ($codigo>0) $sharepoint = "https://inpigovbr.sharepoint.com/Shared%20Documents/pareceres/{$numero}{$codigo}.pdf?web=1";
	}
	else
	{
		$prmexame = 0;
		$sharepoint = "";
	}
    $data_formatada = normalizaData($data);
	
	$despacho_descricao = '';
	if ($despacho=='PR - Recursos' or $despacho=='PR - Nulidades')
	{
		if ($despacho=='PR - Recursos') $decisao = "'recurso provido','recurso ciencia','recurso negado','recurso exigencia','recurso provido anvisa','recurso anvisa','recurso artigo 34','anvisacgrec','artigo 34','recurso provido-devolucao 100.2','recurso provido-reforma 100.1','recurso exigencia 121','recurso manutencao do indeferimento 111'";
		if ($despacho=='PR - Nulidades') $decisao = "'nulidade negada','nulidade parcial','nulidade provida','nulidade 1'";

		$sql3 = "SELECT * FROM pedido WHERE (numero = '$numero1' OR numero = '$numero2') and rpi='$data' and decisao in ($decisao)";
		$res3 = mysqli_query($link,$sql3);
		if ($line3=@mysqli_fetch_assoc($res3))
		{
			$despacho_descricao = $line3['decisao'];
			if ($despacho_descricao=='nulidade 1') $despacho_descricao = "Primeiro parecer de nulidade";
		}
		$despacho_descricao = ucfirst(trim($despacho_descricao));
		$despacho_descricao = str_replace('manutencao', 'manutenção', $despacho_descricao);
		$despacho_descricao = str_replace('devolucao', 'devolução', $despacho_descricao);
	}
	else
	{
		$sql3 = "SELECT * FROM despachos WHERE despacho=:despacho";
		$stmt3 = $pdo->prepare($sql3);
		$stmt3->execute([':despacho' => $despacho]);
		if ($line3 = $stmt3->fetch(PDO::FETCH_ASSOC)) $despacho_descricao = trim($line3['resumo']);
		$posicao = strpos($despacho_descricao, '-');			
		if ($posicao !== false) $despacho_descricao = trim(substr($despacho_descricao, 0, $posicao));
	}
	
	$publicacoes[] = [
		"despacho" 	=> $despacho,
		"despacho_descricao" 	=> $despacho_descricao,
		"data"  	=> $data_formatada,
		"divisao"  	=> $divisao,
		"anulado"   => $str_anulado,
		"etapa"		=> $prmexame,
		"sharepoint"	=> $sharepoint
	];
}

if ($resposta === false) {
    http_response_code(200);
    echo json_encode([
		"numero" => $numero,
		"quantidade" => 0,
		"publicacoes" => [],
        "erro" => true,
        "mensagem" => "Não foi possível identificar nenhuma publicação."
    ], JSON_UNESCAPED_UNICODE);
    exit;
}

$dadosRetorno = [
    "numero" => $numero,
    "quantidade" => count($publicacoes),
    "publicacoes" => $publicacoes
];

echo json_encode($dadosRetorno, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

exit();

?>

