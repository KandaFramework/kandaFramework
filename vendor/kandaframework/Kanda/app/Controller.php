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

class Controller implements  InterfaceController {

      
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
     * @var string Guarda o valor da url base 
     * 
     */
    public static $home;

    
    public static $namespace_module;
     
    public static $controller = 'Default';
    
    public static $module;

    public static $path;

    public static $view = 'default';
    
     public function behaviors() {}

    /**
     * 
     * @param array $main
     */
    public static function begin($main){
 
        self::$module = $main['config']['default'];
        
        if(isset($main['config']['modules'])){
           
          if(isset( $main['config']['modules'][Url::segment(1)])){

             $class = new $main['config']['modules'][Url::segment(1)]['class'];
            
             self::$namespace_module = $class->begin();
                      
          }else{

            $class = new $main['config']['modules'][self::$module]['class'];
            
            self::$namespace_module =  $class->begin();

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
 
        
        $render = View::pathView(self::$namespace_module).'/views/' . self::$view . '/' . $render . '.php';
  
        $layout = View::pathView(self::$namespace_module).'/views/layout/' . $this->layout . '.php';
 
        return View::render($render,$param,$layout);
    }

    public function redirect($render){

      return Url::redirect($render);

    }


    public function renderAjax($render,$param=[]){}
    
     
    public function load(){
    
      $load = $this->createNamespaceController();

      $class = new $load;

      $class->actionIndex();

    }

    public function createNamespaceController(){

      $path = '/'.self::$namespace_module.'/controllers/'.self::$controller.'Controller';
        
      return  str_replace('/','\\',$path);
 
    }
 
      
}