<?php

sucesso([

    "api" => [
        "nome" => "Sinergias API",
        "versao" => "1.0.0",
        "status" => "online",
        "descricao" => "Hub de serviços do Sinergias para integração com IA e aplicações."
    ],

    "endpoints" => [

        [
            "endpoint" => "cep",
            "descricao" => "Consulta endereço por CEP.",
            "url" => "api.php?endpoint=cep&cep=01001000",
            "parametros" => [
                "cep"
            ]
        ],

        [
            "endpoint" => "processo",
            "descricao" => "Consulta processo do INPI.",
            "url" => "api.php?endpoint=processo&numero=BR102024012345",
            "parametros" => [
                "numero"
            ],
            "status" => "Em desenvolvimento"
        ],

        [
            "endpoint" => "patente",
            "descricao" => "Consulta pedido de patente.",
            "status" => "Em desenvolvimento"
        ],

        [
            "endpoint" => "ipc",
            "descricao" => "Consulta classificação IPC.",
            "status" => "Em desenvolvimento"
        ],

        [
            "endpoint" => "cpc",
            "descricao" => "Consulta classificação CPC.",
            "status" => "Em desenvolvimento"
        ]

    ]

]);

?>