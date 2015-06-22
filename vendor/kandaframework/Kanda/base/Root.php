<?php
/**
 * 
 * 
 * @copyright (c) KandaFramework
 * @access public
 * 
 */
namespace base;

class Root{

	  /**
     * @access public
     * 
     * @param string $alias Nome do path para ser criado
     * 
     * @description @theme retorna o theme atual, @weroot retorna Root do framework
     * 
     * @example getAlias('@webroot/controller'); Serar criado o path controller
     * 
     * 
     * @return string Path alias criado
     */
    public static function getAlias($alias) {

        $root = $_SERVER['DOCUMENT_ROOT'];

        $key = strpos($alias, '/');

        $dir = substr($alias, $key);

        /**
         * @theme
         */
        if ($key == 7)
            $root .= '/frontend' . $dir;
        /**
         * @webroot
         */
        elseif ($key == 8)
            return $root . $dir;

        return $root;
    }

   public static function fileExists($filename){

       if(!file_exists(filename))
          throw new Exception("Nonexistent file", 1);
          
      return true;
   }


}