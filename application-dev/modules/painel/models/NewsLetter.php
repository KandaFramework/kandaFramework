<?php

/**
 * @copyright (c) KandaFramework
 * @access public
 * 
 * 
 */

namespace app\modules\painel\models;

class NewsLetter extends \ActiveRecord\Model {

    static $table_name = 'newsletter';
    static $primary_key = 'id';
    
    public static function rules() {

        return [
                 [['nome','telefone'],'required'],
                 ['email','email','required','message'=>'Obrigatório','error'=>'Email inválido'],
                 [['facebook','skype','horario'],'varchar'],
        ];
    }

    public static function attributeLabels() {

        return [
            'nome' => 'Nome',
            'email' => 'Email',
            'telefone'=>'Telefone',
            'facebook'=>'Facebook',
            'skype'=>'Skype',
            'horario'=>'Horario de Contato ',             
        ];
    }

}