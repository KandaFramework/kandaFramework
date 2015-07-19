<?php

/**
 * 
 * @package App
 * 
 * @copyright (c) KandaFramework
 * @access public
 * 
 */

namespace kanda\web;


use kanda\helps\Assets;
use kanda\helps\Session;
use kanda\helps\Html;

class View{


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
    public static $title = '';

    public static function pathapp($path)
    {

        return str_replace('app/',DS,$path);

    }

    public static function render($render,$param=[],$layout){
 

       if(empty($render)) 
         throw new \Exception("Render can not be empty", 1);
         
       if(!file_exists(static::pathapp($layout)) || !file_exists(static::pathapp($render)) )   
            throw new \Exception("Not fond $layout or $render", 1);

        ob_start();
        ob_implicit_flush(false);
        extract($param, EXTR_OVERWRITE);
        require(static::pathapp($render));

        $content = ob_get_clean();
        
        require_once static::pathapp($layout);

        unset($content);

    }

    public static function renderAjax($render,$param=[]){
 

       if(empty($render)) 
         throw new Exception("Render can not be empty", 404);
         
       if(!file_exists(static::pathapp($render))){
          throw new Exception("Not fond $render", 404);
        }             

        ob_start();
        ob_implicit_flush(false);
        extract($param, EXTR_OVERWRITE);
        require(static::pathapp($render));

        echo $content = ob_get_clean();
        unset($content);

    }


    public static function pathView($module){

        return  WWW_ROOT.'/'.str_replace('\\','/',$module);

    }

    public function body(){}

    public function head(){}

    public static function footer(){
            
      if(isset(Session::getSession()->js))
      {

        $session =  array_unique(Session::getSession()->js);
        $assets = '';

        foreach ($session as $value) {
             
             if(is_file(WWW_ROOT.'/public/'.$value))    
                    $assets  .= Html::script(null,['src'=>$value])."\n";
              else
                    $assets .= Html::script($value)."\n";

        }
        Session::clear('js');
        echo $assets;
        }
        
    }

   
 
 
}