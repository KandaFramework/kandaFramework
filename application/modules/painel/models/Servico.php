<?php

/**
 * @copyright (c) KandaFramework
 * @access public
 * 
 * 
 */

namespace modules\painel\models;

class Servico extends \ActiveRecord\Model {

    static $table_name = 'servico';
    static $primary_key = 'id';
    
    public static function rules() {

        return [
            [['nome','descricao'],'required'],              
        ];
    }

    public static function attributeLabels() {

        return [
           'id' => 'Código',
           'nome' => 'Nome',
           'descricao'=> 'descricao',          
             
        ];
    }

}