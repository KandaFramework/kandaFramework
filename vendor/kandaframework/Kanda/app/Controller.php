<?php

/**
 * @package App
 * 
 * Configuração dos controllers
 * 
 * @copyright (c) KandaFramework
 * 
 */

namespace app;

use base\Url;
use base\InterfaceController;
use base\Root;

class Controller extends Url implements  InterfaceController {

    
    /**
     *
     * @access public
     * 
     * @var type string
     * 
     * @description Serar guardado o title da página. Deve ser chamado no arquivo php
     * 
     * @example $this->title = 'KandaFramework';
     * 
     */
    public $title = '';
 
  
    /**
     * @access public
     * 
     * @static
     * 
     * @var string Serar chamado como default caso não tenha passado na action
     * 
     */
    public $layout = 'main';

    /**
     *
     * @access public
     * 
     * @static
     * 
     * @var string Guarda no url dos script que são chamados na pasta assets
     * 
     * 
     */
    public static $assets = '';

    /**
     *
     * @access public 
     * 
     * @var string Guarda o valor da url base 
     * 
     */
    public static $home;

    
    public static $namespace_module;
     
    public static $controller = 'DefaultController';
    
    public static $module;

    public static $path;
    
     public function behaviors() {}

    /**
     * 
     * @param array $main
     */
    public static function begin($main){
 
        self::$module = $main['config']['default'];
        
        if(isset($main['config']['modules'])){
           
          if(isset( $main['config']['modules'][parent::segment(1)])){

             $class = new $main['config']['modules'][parent::segment(1)]['class'];
            
             self::$namespace_module = $class->begin();
                      
          }else{

            $class = new $main['config']['modules'][self::$module]['class'];
            
            self::$namespace_module = $class->begin();

          }          
        }
        
        return new Controller();
        
    }

    /**
     * 
     * @access public
     * 
     * @param string $render Nome do arquivo php 
     * @param arary $param  Valores para ser carreagodo na render
     * 
     * 
     * @description Monta o path da render escolhida
     * Caso não tenha o arquivo na view serar mostrando uma mensagem de erro.
     * 
     */
    public function render($render, $param = []) {
 
        
        $render = self::$path.'/views/' . self::$view . '/' . $render . '.php';
  
        $layout = self::$path.'/views/layout/' . $this->layout . '.php';
 
        return View::render($render,$param,$layout);
    }

    /**
    *
    *
    */


    public static function pathController(){

        $filename =  WWW_ROOT.'/modules/'.self::$module."/controllers/".self::$controller.".php";

        if(!file_exists($filename))
            throw new Exception("File not fond", 1);

        return $filename; 
    }

    /**
    *  
    */
    public function load(){

      $filename = static::pathController();

     
       new self::$namespace_module.'\\controllers\\'.self::$controller;


    }

    public function actions() {}
 
      
}