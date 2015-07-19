<?php
/**
 * @copyright (c) KandaFramework
 * @access public
 * 
 */
   
set_include_path(get_include_path() . PATH_SEPARATOR . WWW_ROOT);
set_include_path(get_include_path() . PATH_SEPARATOR . KANDA_ROOT);
 

require_once __DIR__.'/db/ActiveRecord.php';


require_once __DIR__.'/KBase.php';
  
 
class Kanda extends \kanda\KBase
{    

}
spl_autoload_register(['Kanda', 'autoload'], true, true);

Kanda::begin($main);

//$kanda = new Kanda();
//$kanda->begin($main);