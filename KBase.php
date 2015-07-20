<?php

/**
 * @copyright (c) KandaFramework
 * @access public
 * 
 */

namespace kanda;

class KBase {

    public static $app;
    public static $request;
    public static $get;
    public static $param;

    public static function autoload($class) {

        $class = __DIR__ . DS . str_replace('\\', DS, $class) . '.php';

        $filename = str_replace(DS . 'kanda' . DS, DS, $class);
 
        $app = strpos($filename, 'app/');

        if ($app) {
            $filename = str_replace('app' . DS, WWW_ROOT . DS, substr($class, $app));
        }

        if (is_file($filename))
            require_once $filename;
    }

    /*

     */

    /**
     * @access public
     *      * 
     * @importante metodo @Core contem include as principais class dos sistema
     * 
     * @param array() $main
     * 
     * 
     */
    public static function begin($main) {

        define('DSN', $main['config']['db']['dsn']);

        KBase::$param = (object) $main['param'];

        \ActiveRecord\Config::initialize(function($cfg) {
            $cfg->set_connections(array(
                'development' => DSN));
        });

        date_default_timezone_set($main['config']['timezone']);

        static::aplication();

        \kanda\web\Controller::begin($main)->load();
    }

    public static function aplication() {

        KBase::$request = \kanda\helps\Http::run();
        /*
          KBase::$app = (object) [
          'arrays'     => \kanda\helps\Arrays::run(),
          'cache'      => \kanda\helps\Cache::run(),
          'crop'       => \kanda\helps\Crop::run(),
          'html'       => \kanda\helps\Html::run(),
          'url'        => \kanda\helps\Url::run(),
          'uploadFile' => \kanda\helps\UploadFile::run(),
          'session'    => \kanda\helps\Session::run(),
          ];
         */
    }

}
