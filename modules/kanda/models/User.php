<?php


namespace modules\kanda\models;

class User extends \ActiveRecord\Model{
    
    static $table_name = 'usuario';
    
     static $belongs_to = [
        'nivel'
    ];
    
}