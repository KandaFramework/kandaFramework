<?php


namespace modules\kanda\models;

class Nivel extends \ActiveRecord\Model{
    
    static $table_name = 'nivel';
    
    static $has_one = [['user']]; 
      
}