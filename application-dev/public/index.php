<?php 
 
 ini_set('display_errors', 1);

  define('WWW_ROOT',dirname(__DIR__));
 define('KANDA_ROOT',WWW_ROOT);
 define('ASSETS',dirname(__DIR__).'/public/assets/');

 define('DS',DIRECTORY_SEPARATOR);
   
  /**
  * Configuração do Framework
  */
  
  $config=  WWW_ROOT.'/config/main.php';
 
     
  require_once ($config);
    
  /**
   * Carregando o Framework
   */

  require_once '../../autoload.php';

  require_once '../../KandaFramework.php';