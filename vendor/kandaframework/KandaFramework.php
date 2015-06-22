<?php
/**
 * @copyright (c) KandaFramework
 * @access public
 * 
 */
 

define('Kanda_CORE', dirname(__DIR__ . '/Kanda/'));

set_include_path(get_include_path() . PATH_SEPARATOR . WWW_ROOT);
set_include_path(get_include_path() . PATH_SEPARATOR . Kanda_CORE);
  

require_once WWW_ROOT.'/vendor/autoload.php';
  
require_once WWW_ROOT.'/vendor/activerecord/ActiveRecord.php';
 

use app\Controller;
 
 
class Kanda{

    public static $app;

    public static $request;
    
    public static $get;
    

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
         
    }

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
        
        ActiveRecord\Config::initialize(function($cfg) {
           // $cfg->set_model_directory(MODEL);
            $cfg->set_connections(array(
                'development' => DSN));
        });

        date_default_timezone_set($main['config']['timezone']);
        
        Controller::begin($main)->load();
         
        
    }
     

}
$kanda = new Kanda();
$kanda->begin($main);