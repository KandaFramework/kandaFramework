<?php
/**
 * @package App
 * 
 * Configuração dos controllers
 * 
 * @copyright (c) KandaFramework
 * 
 */

namespace kanda\app;

use kanda\base\Url;
use kanda\base\InterfaceController;
use kanda\base\Root;

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
    public static $action = false;

    
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

        static::$module = $main['config']['default'];
        
        if(isset($main['config']['modules'])){

          if(isset( $main['config']['modules'][Url::segment(1)])){

           $class = new $main['config']['modules'][Url::segment(1)]['class'];
           static::$action = false;
           static::$namespace_module = $class->begin();

       }else{

        $class = new $main['config']['modules'][static::$module]['class'];
        static::$action = true;
        static::$namespace_module =  $class->begin();

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


        $render = View::pathView(self::$namespace_module).'/views/' . strtolower(static::$controller) . '/' . $render . '.php';

        $layout = View::pathView(self::$namespace_module).'/views/layout/' . $this->layout . '.php';

        return View::render($render,$param,$layout);
    }

    public function renderAjax($render,$param=[]){

      $render = View::pathView(self::$namespace_module).'/views/' . strtolower(static::$controller) . '/' . $render . '.php';

      return View::renderAjax($render,$param);

    }

    public function redirect($param=[]){

      return Url::redirect($param);

  }

  public static function Action(){

    $action = 'action';

    if(Url::segment() == null)
       $action .= 'Index';
   else{  //CRUD DELETE CREATE UPDATE VIEW OUTROS
    if(Url::getCount() == 3)
    {
        static::$controller = ucwords(Url::segment(2));
        $action .= ucwords(Url::segment());
    }else{
      //Para chamadas dos controllers  
      if(Url::getCount() == 2){
         static::$controller = ucwords(Url::segment());
         $action .='Index'; 
     }else{
         if(Url::getcount()==1 && static::$action)
         {
             $action .= ucwords(Url::segment());   
         }else
         {
           $action .='Index'; 
       } 

   }


}
}

return $action;

}





public function load(){

  static::Action();  
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


   $path = '/'.static::$namespace_module.'/controllers/'.static::$controller.'Controller';

  return  str_replace('/','\\',$path);

}


}