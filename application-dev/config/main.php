<?php

return $main = [

    'config' => [
        'db' => require 'dsn.php',
        'timezone' => 'America/Sao_Paulo',
        'default' => 'painel', //module default para ser carregado
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
             'admin' => [
                'timezone' => 'America/Sao_Paulo',
                'dirAlias' => '',
                'class' => 'app\modules\admin\Module',
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