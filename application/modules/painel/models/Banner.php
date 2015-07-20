<?php
/**
 * @copyright (c) KandaFramework
 * @access public
 * 
 */
namespace app\modules\painel\models;

class Banner extends \ActiveRecord\Model {

	public $file;
 
    static $table_name = 'banner';
    static $primary_key = 'id';

    public static function rules() {

        return [
            ['file', 'file', 'required','extension'=>"pdf|png|jpg", 'message' => 'Obrigatório', 'error' => 'Somente pdf, png, jpg'],
        ];
    }
 
}