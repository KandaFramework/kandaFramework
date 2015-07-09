<?php

/**
 * @copyright (c) KandaFramework
 * @access public
 * 
 * 
 */

namespace kanda\helps;

use kanda\base\Url as UrlBase;

class Url extends UrlBase{

    public static function run() {
        return new Url();
    }

    static function toRouter($to='')
    {
        if(isset($_SERVER['PATH_INFO']))
        {
            $toRouter = explode('/',$_SERVER['PATH_INFO']);
            return static::baseUrl().'/'.next($toRouter).'/'.$to;

        }        
        else
           return static::baseUrl(); 
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
        return static::baseUrl().$_SERVER['PATH_INFO'].'/'.$to;
    }

}