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
    public static $action;

    
    public static $namespace_module;
     
    public static $controller = 'Default';
    
    public static $module;

    public static $path;

    public static $class;

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

    /**
    *
    *   
    */

    public static function Action(){

        if(empty(Url::segment()))
            return 'actionIndex';
        else
            return 'action'.Url::segment();

    }



    public function renderAjax($render,$param=[]){}
    
     
    public function load(){
    
      $load = $this->createNamespaceController();

      static::$class = new $load;
      call_user_func_array(array(static::$class,static::Action()),static::param());
     

    }
    
    static function param(){

      $params = [];  

     if(!empty($_GET)){

        foreach ($_GET as $param => $value) {
             
            if(static::reflection($param))
                $params[] = $value;
            }
      }
         return $params;

    }

    //Verifica os nomes param dos methods

    static function reflection($param){

        $reflect = new \ReflectionParameter(array(static::$class,static::Action()),$param);

        if(!$reflect)
            return false;
           
        return true;      

    }

    public function createNamespaceController(){

      $path = '/'.self::$namespace_module.'/controllers/'.self::$controller.'Controller';
        
      return  str_replace('/','\\',$path);
 
    }
 
      
}