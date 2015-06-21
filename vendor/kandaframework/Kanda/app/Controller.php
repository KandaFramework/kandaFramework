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

class Controller extends Url implements  InterfaceController {

    /**
     * @access public
     * 
     * @static 
     * 
     * @var type string  $theme Guarda o nome do theme
     * 
     */
    public static $theme;

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
     * @var string $view Guarda o nome da view
     * 
     */
    public static $view;

    /**
     * @access public
     * 
     * @static 
     * 
     * @var string Contem o valor da url
     * 
     */
    public static $server;

    /**
     * @access public
     * 
     * @static
     *  
     * @var string Contem o valor base da url
     * 
     * @example /kandaframework/painel
     * 
     */
    public static $base;

    /**
     * @access public
     * 
     * @static
     * 
     * @var string Contem o valor da url padrão do projeto 
     * 
     */
    public static $baseUrl;

    /**
     * 
     * @access private
     * 
     * @static
     * 
     * 
     * @var string Guarda o nome do controller.
     * 
     * 
     */
    private static $ControllerName;

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

    
    public static $modules;
     

    
    public function behaviors() {}

    /**
     * 
     * @param array $main
     */
    public static function begin($main){
        
        
        if(isset($main['config']['modules'])){
           
          if(isset( $main['config']['modules'][parent::segment(1)])){

             $class = new $main['config']['modules'][parent::segment(1)]['class'];
            
            self::$modules = $class->begin();
                      
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
 
        
        $content = WWW_ROOT . VIEW . self::$theme . '/views/' . self::$view . '/' . $render . '.php';

        self::$assets = $this->assets(self::$theme);

        if (file_exists($content)) {
            $this->loadView($content, $param);
        } else {
            die("View <i style='color:blue;'>$content</i> not fond!");
        }
    }
 

    /**
     * 
     * @param type $actionName
     * @param type $theme
     * @param string $className
     * @param type $frontend
     */
    public function load() {

        
              
    }
    private function actions($_namespace, $actionName, $frontend) {
    
        if(MODULES){
            
        $load = explode('\\',$_namespace);
         
        unset($load[1],$load[0]);
        $_namespace = "\\".implode('\\',$load);
      
        } 
        
        $model = new $_namespace;
       
        
        $action = "action$actionName";
        if (method_exists($model, 'behaviors'))
            $rule = $model->behaviors();
        $rule['getClass'];

        $view = explode('\\', get_class($model));

        $view = end($view);
        /*         * *
         * Carregando o nome da view
         */
        self::$view = substr(strtolower($view), 0, -10);

        if (method_exists($model, $action)) {
            call_user_func_array([$model, $action], $this->paramns($frontend));
            exit;
        } elseif (method_exists($model, "actionIndex")) {

            call_user_func_array([$model, 'actionIndex'], $this->paramns($frontend));
            exit;
        } else
            throw new Exception ('Action not Fond');
    }

    /**
     * 
     * @return string
     * 
     * @description Retorna os valores do parametro da action
     * 
     */
    public function paramns($theme) {
        $param = [];

        if (in_array(parent::segment(1), $theme)) {

            if (strlen(parent::segment(5)) > 0)
                return [parent::segment(4), parent::segment(5)];

            if (strlen(parent::segment(4)) > 0)
                return [parent::segment(4)];

            if (strlen(parent::segment(2)) == 0) {
                return [];
            } else {

                if (strlen(parent::segment(3) > 0)) {
                    return [parent::segment(3)];
                } else
                    return [];
            }
        }else {

            if (strlen(parent::segment(3) > 0))
                return [parent::segment(2), parent::segment(3)];
            elseif (strlen(parent::segment(2) > 0)) {
                if (strlen(parent::segment(3)) > 0)
                    return [parent::segment(2), parent::segment(3)];
                else
                    return [parent::segment(2)];
            } else
                return [parent::segment()];
        }
    }

    /**
     * @access private
     * 
     * @param string $content Referencia do path da content a ser criada
     * @param array  $param Contem os valores a ser extraios 
     * 
     * 
     * @description Monta o conteudo do site
     * 
     * 
     */
    private function loadView($content_, $param = []) {

        $theme = self::$theme;
 
        $main = WWW_ROOT . VIEW . $theme . '/views/layout/' . $this->layout . '.php';
 
        ob_start();
        ob_implicit_flush(false);
        extract($param, EXTR_OVERWRITE);
        require($content_);

        $content = ob_get_clean();

        if (file_exists($main)) {
            require_once $main;
        } else
            die('Not fond main.php');
    }
 

    /**
     * 
     * @param type $theme
     * @param type $controller
     */
    public function NameController($theme, $controller) {


        self::$base = $controller;
        self::$baseUrl = $this->createUrl() . $theme;
        self::$theme = $theme;
        self::$ControllerName = ucfirst($controller);
    }

    /**
     * @access public
     * @param string $theme Contem o nome do theme
     * @return string Retorna a url do path do theme
     * 
     */
    public function assets($theme = '') {
        
        $theme = (!empty($theme)) ? $theme : THEME;
             
        return $this->baseUrl() . '/assets/' . $theme . "/";
    }


    /**
     * 
     * @param type array $json
     * 
     * @return type object Retonar os dados do Json
     * 
     */
    public static function Json($json = []) {

        header('Content-Type: application/json');

        echo json_encode($json);
        exit;
    }
 
}