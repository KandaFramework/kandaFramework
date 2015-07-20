<?php
/**
 * @copyright (c) KandaFramework
 * @access public
 * 
 */
namespace app\modules\painel\models;

class Galeria extends \ActiveRecord\Model {
 
    static $table_name = 'galeria';
    static $primary_key = 'id';

    public $file;

    public static function rules() {

        return [
            ['file', 'file', 'required','extension'=>"pdf|png|jpg", 'message' => 'Obrigatório', 'error' => 'Somente pdf, png, jpg'],
        ];
    }
 
}