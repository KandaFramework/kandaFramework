<?php
/**
 * @copyright (c) KandaFramework
 * @access public
 * 
 * 
 */
namespace kanda\helpers;

class Arrays{
    
    public static function run(){
        return new Arrays();
    }

    public static function map($model,$key,$value){
        
      $map = [];
           foreach($model as $res)
             $map[$res->$key] = $res->$value;
            
       return $map; 
    }   
    
}


