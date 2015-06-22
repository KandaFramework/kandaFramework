<?php

/**
 * 
 * @package App
 * 
 * @copyright (c) KandaFramework
 * @access public
 * 
 */

namespace app;

class View{


    public static function render($render,$param=[],$layout){


       if(empty($render)) 
         throw new Exception("Render can not be empty", 1);
         
       if(!file_exists($layout) || !file_exists($render) )   
            throw new Exception("Not fond $layout or <br/> $render", 1);

        ob_start();
        ob_implicit_flush(false);
        extract($param, EXTR_OVERWRITE);
        require($render);

        $content = ob_get_clean();
        
        require_once $layout;

    }    
 
}