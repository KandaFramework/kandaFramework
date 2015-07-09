<?php
 

function Autoload($class) {
    
    $key = count(explode(DS,WWW_ROOT));
   
    $class = WWW_ROOT.DS. str_replace('\\', DS, $class) . '.php';
    
    $array =  explode(DS,$class);
           
    $baseroot = "src".DS."ksoftware".DS."k2";
       
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
            case 'widgets':
                $array[$key] = $baseroot.DS."widgets";
                break;
           //Tecerios     
            case 'wideImage':
                $array[$key] = "vendor".DS."wideImage";
            break;                   
            
        }
  
    }
    $filename = implode(DS,$array);
      

    if(!file_exists($filename))
        throw new Exception("File path $class not found.");
    
    require $filename;
    
}
spl_autoload_register('Autoload');