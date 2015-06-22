<?php

return $main = [

    'config' => [
        'db' => [
            'dsn' => 'mysql://nome-usuario:senha@localhost/db-name',
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
