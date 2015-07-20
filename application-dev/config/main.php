<?php

return $main = [

    'config' => [
        'db' => [
            'dsn' => 'mysql://root:linux321@localhost/adoremos?charset=utf8',
        ],
        'timezone' => 'America/Sao_Paulo',
        'default' => 'kanda', //module default para ser carregado
        'dirAlias' => '',
        'modules' => [
            'kanda' => [
                'timezone' => 'America/Sao_Paulo',
                'dirAlias' => '',
                'class' => 'app\modules\kanda\Module',
            ],  
             'painel' => [
                'timezone' => 'America/Sao_Paulo',
                'dirAlias' => '',
                'class' => 'app\modules\painel\Module',
            ], 
        ],
        'urlManager' => [
            'class'
        ],
    ],
    'vendor'=>[
             require 'vendor.php',
    ],
    'param' => [ 
        //padrão do Framework
        'setFlash'=>function($message,$type) 
        {
            return "Alert('$type','$message');";
        },
      'name' => 'KandaFramework-MVC',          
    ],
];