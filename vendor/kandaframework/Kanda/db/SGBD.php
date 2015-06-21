<?php

/**
 * Conexão PDO
 * 
 * @copyright (c) KandaFramework
 * @access public
 */

namespace vendor\db; 

class SGBD{
       
    /**
     * @access public
     * 
     * @var string 
     */
    public static $fetch_assoc = parent::FETCH_ASSOC;
    
    /**
     * @access public
     * 
     * @var string 
     */
    public static $fetch_obj   = parent::FETCH_OBJ;
    
    /**
     * @access private
     * 
     * @var string
     * 
     */
    private static $find = '';
    
    /**
    * 
    * @return object Referencia do objeto PDO
    */ 
    public function __construct() {
        
        try{
            
         return  $obj = new PDO(DSN,USER, PASSWORD);
        
        }catch(PDOException $e){
           
         echo "Codigo --->".$e->getCode().'<br/>';
            
         echo "Menssagem --->".$e->getMessage();
            
        }
    }
    
    public static function db(){
                
    try{
            
    $obj = new \PDO(DSN,USER, PASSWORD);
            
            
    }catch (PDOException $e){
            throw new PDOException($e->getMessage());
    }
            return $obj;
    }
    
    public static function createCommand($param){
        
        $obj = self::db()->prepare($param);
        
        try{
            
            $obj->execute();
            self::$find = $obj;
            $Class = __CLASS__;
            
            return new $Class;           
            
        }catch (PDOException $e){
            throw new PDOException($e->getMessage());
        }
               
    }

   /**
   * @public
   * 
   * @return object Return all rows
   * 
   */
   public function findAll($condicion=''){
       
   $obj = [];
       
   while($res = self::$find->fetch(PDO::FETCH_OBJ)){
          
          $obj[] = $this->returnFindAll($res);
          
   }       
      
   return (object) $obj;
      
   }
   /**
    * @public
    * 
    * @return objct Return a row;
    */
   
   public function find($condicion=''){
      
    return (object) self::$find->fetch(PDO::FETCH_OBJ);
      
   }
   /**
   * @private
   * 
   * @return object Return all columns
   * 
   */
   private function returnFindAll($find){
        return $find;
   }    
    
}