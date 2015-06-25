<?php
 

function Autoload($class) {
    
    $class = WWW_ROOT.DS. str_replace("\\", DS, $class) . '.php';

    $array =  explode('/',$class);
    $array = array_filter($array);
    
    $filename = '';
        
    foreach ($array as $param){

        
        switch ($array[3]){
            
            case 'app':
                $array[3] = Kanda_CORE.'/app';
                break;
            case 'base':
                $array[3] = Kanda_CORE.'/base';
                break;
            case 'helps':
                $array[3] = Kanda_CORE.'/helps';
                break;                  
            
        }
  
    }
    
    $filename = '/'.implode('/',$array);
    
   
    
    if(!file_exists($filename))
        throw new Exception("File path $class not found.");
    
    require $filename;
    
}
spl_autoload_register('Autoload');