<?php

namespace kanda\fileupload;

use kanda\helps\Session;
use kanda\helps\Html;
use kanda\helps\Json;
use kanda\helps\Assets;
use kanda\base\AbstractWidget;
 
class FileUpload extends AbstractWidget{


    private static $assets = null;

    public static function version()
    {
      echo '1.0';
    }


    //2
    public function __construct()
    {

        $assets = new Assets();
 
        $assets->base = __DIR__.'/assets/';
         
        $assets->basename = 'jQueryFileUpload';   
        
        $assets->js = [
            'js/vendor/jquery.ui.widget.js',
            'js/jquery.iframe-transport.js',
            'js/jquery.fileupload.js',            
        ]; 
         //Script para ser listado no final
        $assets->init();
    }
    //1
    static function class_name()
    {
       return new FileUpload();
    }
    //3
    public function begin($name,$value,$param='')
    {

      return static::gridBootstrap(Html::input('file',$name,$value,['class'=>'form-control',' id'=>$name]),$name);
    }

    static function gridBootstrap($tag,$name)
    {

     Assets::createAssets([static::end($name)],'js');
    // static::$assets->createAsset(['alert(1)'],'endAssets');   

     return '<div class="form-group">
                    '.$tag.'
                    <div id="progress" class="progress">
                        <div class="progress-bar" style="width:0%;">
                        <span class="sr-only"></span>
                    </div>
                </div>
      </div>';
      
      

    }
    //4
    static function end($name)
    {
      
      $param = [
         "progressall" => "function(e,data){var progress = parseInt(data.loaded / data.total * 100, 10); $('#progress .bar').css( 'width', progress + '%' );}",
      ];

      return '$(function () {$("#'.$name.'").fileupload();});';        

    }
}