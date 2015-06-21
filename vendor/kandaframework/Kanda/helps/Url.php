<?php

/**
 * @copyright (c) KandaFramework
 * @access public
 * 
 * 
 */

namespace helps;

use app\Controller;

class Url extends Controller {

    public static function run() {
        return new Url();
    }

    /**
     * 
     * @param boolean $home true, false serar retornado a url do theme
     * 
     * 
     */
    public static function home($url = '') {

        if (empty($url))
            return parent::$home . '/' . parent::$theme;
        else
            return parent::$home . '/' . parent::$theme . '/' . $url;
    }

    /**
     * 
     * @param type $url
     * @return type
     */
    public static function base($url = '') {

        if (empty($url))
            return parent::$base;
        else
            return parent::$base . '/' . $url;
    }
    
    public static function prev(){
        
        return parent::$baseUrl.'/'.parent::$base;
        
    }

    public static function request() {
        return $_SERVER['REQUEST_URI'];
    }

    public static function query_string() {
        return $_SERVER['QUERY_STRING'];
    }

}
