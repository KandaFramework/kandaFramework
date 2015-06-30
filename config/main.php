<?php

return $main = [

    'config' => [
        'db' => [
            'dsn' => 'mysql://root:linux321@localhost/adoremos?charset=utf8',
        ],
        'timezone' => 'America/Sao_Paulo',
        'default' => 'painel',
        'dirAlias' => '',
        'modules' => [
            'kanda' => [
                'timezone' => 'America/Sao_Paulo',
                'dirAlias' => '',
                'class' => 'modules\kanda\Module',
            ],  
             'painel' => [
                'timezone' => 'America/Sao_Paulo',
                'dirAlias' => '',
                'class' => 'modules\painel\Module',
            ], 
            'adoremos' => [
                'timezone' => 'America/Sao_Paulo',
                'dirAlias' => '',
                'class' => 'modules\adoremos\Module',
            ], 

        ],
        'urlManager' => [
            'class'
        ],
    ]
];
