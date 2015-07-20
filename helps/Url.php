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

   public static function toRouter($to=[])
   {
        if(isset($_SERVER['PATH_INFO']))
        {
            $toRouter = explode('/',$_SERVER['PATH_INFO']);
            return static::baseUrl().'/'.next($toRouter).'/'.static::getParam($to);

        }        
        else
           return static::baseUrl(); 
   }

   public static function request()
    { 
        return static::baseUrl().($_SERVER['REQUEST_URI']);
    }

   public static function prev()
    {
        $prev =  explode('/',$_SERVER['REQUEST_URI']);

        array_pop($prev);

        return  static::baseUrl().implode('/',$prev);
    }

   public static function to($to=[])
    {
        return static::baseUrl().$_SERVER['PATH_INFO'].'/'.static::getParam($to);
    }

}