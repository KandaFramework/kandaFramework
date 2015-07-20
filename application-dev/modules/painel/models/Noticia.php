<?php

/**
 * @copyright (c) KandaFramework
 * @access public
 * 
 * 
 */

namespace app\modules\painel\models;


class Noticia extends \ActiveRecord\Model {

    static $table_name = 'noticia';
    static $primary_key = 'id';
    
   // static $belongs_to = [["status", 'select'=>'']];
 
   public static function rules() {

        return [
            [['nome','status_id'],'required'],
            ['descricao']
        ];
    }

    public static function attributeLabels() {
   
        return [
            'nome' => 'Nome',
            'descricao' => 'Descrição',
            'cri' => 'Criação',
            'status' => 'Status', 
            'status_id'=>'Status',
        ];
    }

}