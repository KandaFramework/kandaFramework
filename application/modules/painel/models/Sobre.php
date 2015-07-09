<?php
/**
 * @copyright (c) KandaFramework
 * @access public
 * 
 * 
 */
namespace modules\painel\models;

class Sobre extends \ActiveRecord\Model {

    static $table_name = 'sobre';
    static $primary_key = 'id';


    public static function rules() {

        return [
            [['descricao'],'varchar'],
        ];
    }

}