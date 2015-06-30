<?php

/**
 * @copyright (c) KandaFramework
 * @access public
 * 
 * 
 */

namespace helps;

use base\Url as UrlBase;

class Url extends UrlBase{

    public static function run() {
        return new Url();
    }

    static function toRouter()
    {
    	return static::baseUrl().($_SERVER['PATH_INFO']);
    }

    static function request()
    { 

        return static::baseUrl().($_SERVER['REQUEST_URI']);
    }

    static function prev()
    {
        $prev =  explode('/',$_SERVER['REQUEST_URI']);

        array_pop($prev);

        return  static::baseUrl().implode('/',$prev);
    }

    static function to($to='')
    {
        return static::toRouter().$to;
    }

}