<?php

/**
 * @copyright (c) KandaFramework
 * @access public
 * 
 * 
 */

namespace app\modules\painel\models;

class Usuario extends \ActiveRecord\Model {

    static $table_name = 'usuario';
    static $primary_key = 'id';
    public $confirm_senha;

    public $file;

    public static function rules() {

        return [
            [['nome','login','senha','confirm_senha'],'required'],
            ['email','email','required','message'=>'Obrigatório','error'=>'Email inválido'],
            #['email', 'email', 'required', 'message' => 'Obrigatório', 'error' => 'E-mail inválido'],
            #['foto', 'file', 'required','extension'=>"pdf|png|jpg", 'message' => 'Obrigatório', 'error' => 'Somente pdf, png, jpg'],
        ];
    }

    public static function attributeLabels() {

        return [
         'id' => 'Código',
           'nome' => 'Nome',
            'login' => 'Login',
            'user_id' => 'Código',
            'senha' => 'Senha',
            'nivel_id' => 'Nível',
            'confirm_senha' => 'Confirmar senha',
            'email'=>'Emailff',
            'browser'=>'Navegador',
            'file' => 'Foto',
             
        ];
    }

}