<?php

/**
 * @copyright (c) KandaFramework
 * @access public
 * 
 * 
 */

namespace app\modules\painel\models;

class Video extends \ActiveRecord\Model {

    static $table_name = 'video';
    static $primary_key = 'id';
    public $confirm_senha;

    public static function rules() {

        return [
                 [['nome','video'],'required'],
                 ['foto','descricao','varchar'],
        ];
    }

    public static function attributeLabels() {

        return [
            'nome' => 'Nome',
            'video' => 'Link do youtube',
            'descricao' => 'Descrição'
        ];
    }

}