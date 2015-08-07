<?php

namespace kanda\fileupload;

use kanda\helpers\Session;
use kanda\helpers\Html;
use kanda\helpers\Url;
use kanda\helpers\Json;
use kanda\helpers\Assets;
use kanda\base\AbstractWidget;

class FileUpload extends AbstractWidget {

    private static $assets = null;
    private static $param = [];
    private static $basename = 'FileUpload';

    public static function version() {
        echo '1.0';
    }

    //2
    public function __construct() {

        $assets = new Assets();

        $assets->base = __DIR__ . '/assets/';

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
    public static function class_name() {
        return new FileUpload();
    }

    //3
    public function begin($name, $basename, $value, $param = '') {

        static::$basename = $basename;
 
        $extra = [
            'extra' => [
                'progressall' => "function (e, data) { var progress = parseInt(data.loaded / data.total * 100, 10); $('.progress-bar').css({'background-color':'#5ECE7E','height':'20px'});$('.progress-bar').css('width',progress + '%')}",
            ]
        ];

        $condition = substr(Json::encode($param['conditions'], false), 0, -1);

        static::$param = $condition . ',';
        static::$param .= Html::conditionJs(array_merge($extra['extra'],$param['extra'])) . '}';


        return static::gridBootstrap(Html::input('file', $name, $value, ['class' => 'form-control', ' id' => $basename]));
    }

    public static function gridBootstrap($tag) {

        Assets::createAssets([static::end()], 'js');
       
        return '<div class="form-group">
                    ' . $tag . '
                    <div id="progress" class="progress">
                        <div class="progress-bar" style="width:0%;">
                        <span class="sr-only"></span>
                    </div>
                </div>
      </div>';
    }

    //4
    public static function end() 
    {

        $param = [
            "progressall" => "function(e,data){var progress = parseInt(data.loaded / data.total * 100, 10); alert(progress) }",
        ];

        return "$(function (){ $('input[type=\"file\"]#" . static::$basename . "').fileupload(" . static::$param . ") });";
    }
     
    public static function widget($name,$param)
    {
        
        $model = new FileUpload();
        return  $model->begin($name, $name, null,$param);
        
    }
}
