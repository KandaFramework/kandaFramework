<?php

return $main = [

    'config' => [
        'db' => [
            'dsn' => 'mysql://NOME-USUARIO:SENHA-USUARIO@localhost/DB-NAME',
        ],
        'timezone' => 'America/Sao_Paulo',
        'default' => 'kanda',
        'dirAlias' => '',
        'modules' => [
            'kanda' => [
                'timezone' => 'America/Sao_Paulo',
                'dirAlias' => '',
                'class' => 'modules\kanda\Module',
            ],
            'site' => [
                'timezone' => 'America/Sao_Paulo',
                'dirAlias' => '',
                'class' => 'modules\site\Module',
            ],
        ],
        'urlManager' => [
            'class'
        ],
    ]
];
