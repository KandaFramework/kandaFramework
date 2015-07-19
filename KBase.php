<?php
/**
 * @copyright (c) KandaFramework
 * @access public
 * 
 */
namespace kanda;


class KBase
{

	public static $app;

    public static $request;
    
    public static $get;
    
    public static $param;


	public static function autoload($class)
	{

    $class = __DIR__.DS. str_replace('\\', DS, $class) . '.php';

    $filename = str_replace(DS.'kanda'.DS, DS, $class);

    //$filename = str_replace(DS.'app'.DS, WWW_ROOT, $class);

    $app  = strpos($filename,'app/');

    if($app)
    {
    $filename = str_replace('app'.DS, WWW_ROOT.DS, substr($class, $app));        
    }

    if(is_file($filename))
        require_once $filename;
  



	}
 	
 	/*

    public function __construct() {

        Kanda::$request = helps\Http::run();
          
         Kanda::$app = (object) [
                    'arrays'     => helps\Arrays::run(),
                    'cache'      => helps\Cache::run(),
                    'crop'       => helps\Crop::run(),
                    'html'       => helps\Html::run(),
                    'url'        => helps\Url::run(),
                    'uploadFile' => helps\UploadFile::run(),
                    'session'    => helps\Session::run(),
        ];
         
    }*/

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
   
        define('DSN',$main['config']['db']['dsn']);
        
        KBase::$param = (object) $main['param'];

        \ActiveRecord\Config::initialize(function($cfg) {
                $cfg->set_connections(array(
                'development' => DSN));
        });

        date_default_timezone_set($main['config']['timezone']);
        
        \kanda\web\Controller::begin($main)->load();
         
        
    }


}