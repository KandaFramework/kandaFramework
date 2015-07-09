<?php
/**
 * @copyright (c) KandaFramework
 * @access public
 * 
 * 
 */

namespace help;

use helps\Session as Session;

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