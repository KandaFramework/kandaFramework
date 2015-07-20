<?php

/**
 * @copyright (c) KandaFramework
 * @access public
 * 
 * 
 */

namespace app\modules\painel\models;

class Aula extends \ActiveRecord\Model {

    static $table_name = 'aula';
    static $primary_key = 'id';
    
    public static function rules() {

        return [
            [['nome'],'required'],              
        ];
    }

    public static function attributeLabels() {

        return [
           'id' => 'Código',
           'nome' => 'Nome',          
             
        ];
    }

}