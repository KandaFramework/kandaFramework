<?php


function Autoload($class) {
    
    $key = count(explode(DS,dirname(__FILE__)));
         
    $class = dirname(__FILE__).DS. str_replace('\\', DS, $class) . '.php';
    
    $array =  explode(DS,$class);
           
   $baseroot = dirname(__FILE__).DS;
   
                 
    foreach ($array as $param){
             
        switch ($array[$key]){
            
            case 'app':
                $array[$key] = DS."app";
                break;
            case 'base':
                $array[$key] = DS."base";
                break;
            case 'helps':
                $array[$key] = DS."helps";
            
                break;  
            case 'widgets':
                $array[$key] = DS."widgets";
                break;                   
            
        }
  
    }   
    
    $filename = implode(DS,$array);
      
    if(!file_exists($filename))
        throw new Exception("File path $class not found.");
    
    require $filename;
    
}
spl_autoload_register('Autoload');