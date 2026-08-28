<?php
header("Content-Type: application/json; charset=utf-8");
header("Access-Control-Allow-Origin: *");

if (!isset($_GET["cep"])) {
    http_response_code(400);
    echo json_encode([
        "erro" => true,
        "mensagem" => "Informe o parâmetro cep."
    ], JSON_UNESCAPED_UNICODE);
    exit;
}

// Mantém apenas números
$cep = preg_replace('/\D/', '', $_GET["cep"]);

if (strlen($cep) != 8) {
    http_response_code(400);
    echo json_encode([
        "erro" => true,
        "mensagem" => "CEP inválido."
    ], JSON_UNESCAPED_UNICODE);
    exit;
}

// Consulta o ViaCEP
$url = "https://viacep.com.br/ws/$cep/json/";

$context = stream_context_create([
    "http" => [
        "method" => "GET",
        "timeout" => 10
    ]
]);

$resposta = @file_get_contents($url, false, $context);

if ($resposta === false) {
    http_response_code(500);
    echo json_encode([
        "erro" => true,
        "mensagem" => "Não foi possível consultar o ViaCEP."
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