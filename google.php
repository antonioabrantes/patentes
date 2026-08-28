<?php
header("Content-Type: application/json; charset=utf-8");
header("Access-Control-Allow-Origin: *");

// https://sinergias.inpi.gov.br/apiphp/endpoints/google.php?doc=US5000000
// https://cientistaspatentes.com.br/apiphp/endpoints/google.php?doc=US5000000 
// https://cientistaspatentes.com.br/apiphp/endpoints/google.php?doc=MU8702008
// https://cientistaspatentes.com.br/apiphp/endpoints/google.php?doc=WO2023020519
// https://cientistaspatentes.com.br/apiphp/endpoints/google.php?doc=WO23020519 
// https://cientistaspatentes.com.br/apiphp/endpoints/google.php?doc=BR102015020346 


// https://www.uspto.gov/patents/apply/applying-online/country-codes-wipo-st3-table
$countryCodes = [
    'AF','AL','DZ','AD','AO','AI','AQ','AG','AR','AM','AW',
    'AU','AT','AZ','BS','BH','BD','BB','BY','BE','BZ','BJ',
    'BM','BT','BO','BA','BW','BV','BR','BN','BG','BF','BI',
    'KH','CM','CA','CV','KY','CF','TD','CL','CN','CX','CC',
    'CO','KM','CG','CD','CK','CR','CI','HR','CU','CY','CZ',
    'DK','DJ','DM','DO','EC','EG','SV','GQ','ER','EE','ET',
    'FK','FO','FJ','FI','FR','GA','GM','GE','DE','GH','GI',
    'GR','GL','GD','GP','GU','GT','GG','GN','GW','GY','HT',
    'VA','HN','HK','HU','IS','IN','ID','IR','IQ','IE','IM',
    'IL','IT','JM','JP','JE','JO','KZ','KE','KI','KP','KR',
    'KW','KG','LA','LV','LB','LS','LR','LY','LI','LT','LU',
    'MO','MK','MG','MW','MY','MV','ML','MT','MR','MU','MX',
    'MD','MC','MN','ME','MS','MA','MZ','MM','NA','NR','NP',
    'NL','AN','NZ','NI','NE','NG','MP','NO','OM','PK','PW',
    'PA','PG','PY','PE','PH','PL','PT','QA','RO','RU','RW',
    'SH','KN','LC','PM','VC','WS','SM','ST','SA','SN','RS',
    'SC','SL','SG','SK','SI','SB','SO','ZA','GS','ES','LK',
    'SD','SR','SJ','SZ','SE','CH','SY','TW','TJ','TZ','TH',
    'TL','TG','TK','TO','TT','TN','TR','TM','TC','TV','UG',
    'UA','AE','GB','US','UY','UZ','VU','VE','VN','VG','EH',
    'YE','ZM','ZW',

    // Organizações WIPO ST.3
    'WO','EP','EA','AP','OA','BX','GC','EM','XN','QZ','IB'
];

function ajustarNumero($s)
{
    // Se já estiver no formato WO2007113596, retorna sem alterar
    if (preg_match('/^WO(19\d{2}|20\d{2})\d{6}$/', $s)) {
        return $s;
    }

    //echo "Recalculando...\n";

    if (preg_match('/^WO(\d{2})(\d{5,6})(.*)$/', $s, $matches)) {

        $anoCurto = (int)$matches[1];
        $sequencia = (int)$matches[2];
        $sufixo = $matches[3];

        // Regra: 00–29 → 2000+, 30–99 → 1900+
        if ($anoCurto <= 29) {
            $anoCompleto = 2000 + $anoCurto;
        } else {
            $anoCompleto = 1900 + $anoCurto;
        }

        return "WO" .
               $anoCompleto .
               sprintf("%06d", $sequencia) .
               $sufixo;
    }

    return $s;
}
/*
Exemplos
echo ajustarNumero("WO07113596");
// WO2007113596

echo ajustarNumero("WO0312345A1");
// WO2003012345A1

echo ajustarNumero("WO99123456");
// WO1999123456

echo ajustarNumero("WO2007113596");
// WO2007113596
*/

function obterTextoGooglePatents($doc)
{

    $doc = trim($doc);
    $doc = ajustarNumero($doc);
    $doc_original = $doc;
    $variacoes = [
        $doc,
        $doc . "A",
        $doc . "A1",
        $doc . "A2",
        $doc . "A8",
        $doc . "B1",
        $doc . "B2",
        $doc . "Y1",
        $doc . "U",
    ];

    foreach ($variacoes as $publicacao)
    {
        $url = "https://patents.google.com/patent/$publicacao/en?oq=$doc_original";
        //echo "URL: $url\n";

        // Faz o download da página
        $ch = curl_init($url);
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_TIMEOUT => 20,
            CURLOPT_USERAGENT => "Mozilla/5.0",
            CURLOPT_SSL_VERIFYPEER => false,
        ]);

        $html = curl_exec($ch);

        if (curl_errno($ch)) {
            curl_close($ch);
            continue;
        }

        $http = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($http != 200) {
            continue;
        }

        libxml_use_internal_errors(true);

        $dom = new DOMDocument();
        $dom->loadHTML($html);

        $xpath = new DOMXPath($dom);

        $title = trim($xpath->evaluate('string(//meta[@name="DC.title"]/@content)'));
        $data = trim($xpath->evaluate('string(//meta[@name="DC.date"]/@content)'));

        // 1) Tenta pegar a descrição completa
        $description = "";
        $nodes = $xpath->query("//section[@itemprop='description']");
        foreach ($nodes as $node) {
            $description .= " " . trim($node->textContent);
        }

        // 1) Tenta pegar o resumo
        $abstract = "";
        $nodes = $xpath->query("//div[contains(@class,'abstract')]");
        foreach ($nodes as $node) {
            $abstract .= " " . trim($node->textContent);
        }

        // 3) Última tentativa
        if (trim($description) == "") {
            $nodes = $xpath->query("//span[contains(@class,'google-src-text')]");
            foreach ($nodes as $node) {
                $description .= " " . trim($node->textContent);
            }
        }
        //echo "Tamanho description: " . strlen($description) . PHP_EOL;
        //echo "Tamanho abstract: " . strlen($abstract) . PHP_EOL;
        if (
            trim($title) != "" ||
            trim($abstract) != "" ||
            trim($description) != ""
        ) break; 
    }

    if (
        trim($title) != "" ||
        trim($abstract) != "" ||
        trim($description) != ""
    ) 
    {
        return json_encode([
            "numero"      => $publicacao,
            "url"         => $url,
            "title"       => $title,
            "date"        => $data,
            "abstract"    => $abstract,
            "description" => $description
        ], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }
    else
    {
        http_response_code(400);
        echo json_encode([
            "erro" => true,
            "mensagem" => "Google Patents não reconhece este doc $doc."
        ], JSON_UNESCAPED_UNICODE);
        exit;    
    }
}

//echo "Iniciando...<BR>";
//var_dump($_SERVER['REQUEST_URI']);
//var_dump($_GET);

if (!isset($_GET["doc"])) {
    http_response_code(400);
    echo json_encode([
        "erro" => true,
        "mensagem" => "Informe o parâmetro doc."
    ], JSON_UNESCAPED_UNICODE);
    exit;
}

// Mantém apenas números
$doc = trim($_GET["doc"]);

if (strlen($doc) < 4) {
    http_response_code(400);
    echo json_encode([
        "erro" => true,
        "mensagem" => "parâmetro doc inválido."
    ], JSON_UNESCAPED_UNICODE);
    exit;
}

$doc = trim(strtoupper($doc));
$doc = preg_replace('/[A-Z]\d?$/i', '', $doc);
/*
MU8702008U   -> MU8702008
MU8702008U2  -> MU8702008
US5000000B2  -> US5000000
EP1234567A1  -> EP1234567
JP123456C    -> JP123456
*/
if (preg_match('/^\d/', $doc)) $doc = 'BR'.$doc;

$codigo = null;
$prefixo = strtoupper(substr($doc, 0, 2));
//echo "countrycode=[$prefixo]<BR>";
if ($prefixo=='PI' || $prefixo=='MU') $doc = 'BR'.$doc;
if (!in_array($prefixo, $countryCodes, true)) 
{
    http_response_code(400);
    echo json_encode([
        "erro" => true,
        "mensagem" => "country code inválido."
    ], JSON_UNESCAPED_UNICODE);
    exit;
}

/*
$url = "https://patents.google.com/patent/{$doc}A/en?oq=$doc";

$context = stream_context_create([
    "http" => [
        "method" => "GET",
        "timeout" => 10
    ]
]);
*/

// $doc = "US5000000";
$texto = obterTextoGooglePatents($doc);

$dados = json_decode($texto, true);

if (
    empty($dados["title"]) &&
    empty($dados["abstract"]) &&
    empty($dados["description"])
) {
    $novo_doc = substr($doc, 0, 6) . "0" . substr($doc, 6);
    $texto = obterTextoGooglePatents($novo_doc);
}

echo $texto;

exit();

$resposta = @file_get_contents($url, false, $context);

if ($resposta === false) {
    http_response_code(500);
    echo json_encode([
        "erro" => true,
        "mensagem" => "Não foi possível consultar o Google Patents."
    ], JSON_UNESCAPED_UNICODE);
    exit;
}



$dados = json_decode($resposta, true);

if (isset($dados["erro"])) {
    http_response_code(404);
    echo json_encode([
        "erro" => true,
        "mensagem" => "CEP não encontrado."
    ], JSON_UNESCAPED_UNICODE);
    exit;
}

$dadosRetorno = [
    "text" => "Endereço encontrado para o CEP {$dados['cep']}:",
    "cep" => $dados["cep"],
    "logradouro" => $dados["logradouro"],
    "complemento" => $dados["complemento"],
    "bairro" => $dados["bairro"],
    "cidade" => $dados["localidade"],
    "uf" => $dados["uf"],
    "estado" => $dados["estado"] ?? "",
    "regiao" => $dados["regiao"] ?? "",
    "ibge" => $dados["ibge"],
    "ddd" => $dados["ddd"]
];

echo json_encode($dadosRetorno, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

?>