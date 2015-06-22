<?php


namespace modules\kanda\models;

class User extends \ActiveRecord\Model{
    
    static $table_name = 'usuario';
    /**
    * Relacionamento ActiveRecord
    */
    static $belongs_to = [
        'nivel'
    ];
    
}