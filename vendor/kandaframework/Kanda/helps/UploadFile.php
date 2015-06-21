<?php
/**
 * @copyright (c) KandaFramework
 * @access public
 * 
 * 
 */
namespace helps;


class UploadFile{
    /**
     *
     * @name string Nome do file
     */
    public $name;
    public $type;
    public $tmpName;
    public $typeName;
    public $size;
    public static $saveAs;

    public static function run(){
       return new UploadFile();
    }

        public function __construct($load='') {
        
        if(!empty($load)){
        self::$saveAs = $load['tmpName'];
        $this->name =  $load['name'];
        $this->type =  $load['type'];
        $this->tmpName =  $load['tmpName'];
        $this->size =  $load['size'];
        $this->typeName =  $load['typeName'];
        }
         
    }
    /**
     * @static
     * 
     * @access public
     * 
     * @param type $column Noma da coluna passado no input file
     * @return objct UploadFile()
     * 
     * 
     */

    public static function load($model,$column){
         
       $namespace = get_class($model);  
       $className = explode('\\',$namespace); 
       
       $className = end($className);
          
     if(method_exists($model,'rules') && !empty($_FILES[$className])){ 
       
     $rules = Http::getRules($model::rules());
      
     if(in_array($column,$rules)){
      
      $type =   explode('/',$_FILES[$className]['type'][$column]); 
         
      $load = [
           'name'    => $_FILES[$className]['name'][$column],
           'type'    => $_FILES[$className]['type'][$column],
           'tmpName' => $_FILES[$className]['tmp_name'][$column],
           'size' =>    $_FILES[$className]['size'][$column],
           'typeName' => end($type),
             
       ];
      
       return new UploadFile($load);
        
       }else{
           
           return [];
           
       }
       }else
           return [];
       
    }
    /**
     * 
     * @param type $fileName Nome completo do arquivo para ser salvo
     * 
     * @return boolen Description
     */
    public static function saveAs($fileName){
        
        try {
          move_uploaded_file(self::$saveAs,$fileName);
          chmod($fileName, 0777);
          return true;         
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }  
       
       
    }
    /**
     * 
     * @param type $name
     * @return type
     */
    public static function formatName($name){
        
        $name  = str_replace(['','_','/'],['','-','-'],  strtolower($name));
        
        return $name;
    }
    
    public static  function  CreateDir($dir){
              
            if(is_dir($dir))
              return true;
            else{
               mkdir ($dir,0777);    
               chmod($dir,0777);
            }
   }
    
}