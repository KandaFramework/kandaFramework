<?php
 

function Autoload($class) {
    
    switch(PHP_OS){
         
      case 'WINNT':
       $key = 4;$dilimitador = '';
        break;
      default:
      //Para Linux ou Mac
      $key = 3;$dilimitador = '/';
    
    }
    
    $class = WWW_ROOT.DS. str_replace('\\', DS, $class) . '.php';
    
    $array =  explode(DS,$class);
           
    $baseroot = "vendor".DS."kandaframework".DS."Kanda";
       
    foreach ($array as $param){
   
        switch ($array[$key]){
            
            case 'app':
                $array[$key] = $baseroot.DS."app";
                break;
            case 'base':
                $array[$key] = $baseroot.DS."base";
                break;
            case 'helps':
                $array[$key] = $baseroot.DS."helps";
                break;                  
            
        }
  
    }
    $filename = $dilimitador.implode(DS,$array);
     
    if(!file_exists($filename))
        throw new Exception("File path $class not found.");
    
    require $filename;
    
}
spl_autoload_register('Autoload');