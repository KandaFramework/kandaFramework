<?php
/**
 * @copyright (c) KandaFramework
 * @access public
 * 
 * 
 */

namespace app\help;

use kanda\helpers\Session;

class User{
    
    
    public static function rule(){
        
        if(empty(Session::getSession()->id) ){
            Session::clear();            
            header('Location:/painel/');
            exit;
            
        }else
            return true;
        
    }
    
}