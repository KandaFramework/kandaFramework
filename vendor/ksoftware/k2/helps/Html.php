<?php
/**
 * @copyright (c) KandaFramework
 * @access public
 * 
 * 
 */
namespace helps;

class Html{

    
    private static $tr;
    
    public static function run() {
        return new Html();
    }
    
    public static function htmlOptions($param = []) {

        $atributos = '';
 
        
        if (!empty($param)) {
                        
            
            foreach ($param as $atributo => $value) {

                if ($atributo == 'label' || $atributo == 'options' || $atributo == 'selected')
                    continue;

                    
                   if(!is_array($value))
                      $atributos .= "$atributo=\"$value\"";
            }
        }
        return $atributos;
    }
    

    /**
     * 
     * @param type $text
     * @param type $url
     * @param type $param
     * @return string
     */
    public static function a($text='',$url='',$param=[]) {
        
      $tag = "<a href='{$url}' ".self::htmlOptions($param)."  >{$text}</a>";
      
      return $tag;        
    }
    
    public static function ul($value,$param=[]){
        $tag = "<ul ".self::htmlOptions($param).">$value</ul>";
        return $tag;
    }
    
    public static function li($value,$param=[]){
        
        $tag = "<li ".self::htmlOptions($param)."  >$value</li>";
        return $tag;
        
        
    }
     
    /**
     * 
     * @param type $text
     * @param type $url
     * @param type $param
     * @return string
     */
    public static function span($text,$param=[]) {
        
      $tag = "<span ".self::htmlOptions($param)."  >{$text}</span>";
      
      return $tag;        
    }
    
    public static function label($value,$param=[]){
        $tag = "<label ".self::htmlOptions($param)." >$value</label>";
        return $tag;
                
    }

    /**
     * 
     * @param type $text
     * @param type $url
     * @param type $param
     * @return string
     */
    public static function button($text,$type='button',$param=[]) {
        
      $tag = "<button type='$type' ".self::htmlOptions($param)."  >{$text}</button>";
      
      return $tag;        
    }
    /**
     * 
     * @param type $file
     * @return string
     */
    public static function cssFile($href='',$param=['rel'=>'stylesheet']) {

        $tag = "<link ".self::htmlOptions($param)." href='$href' />";

        return $tag;
    }
    /**
     * 
     * @param type $file
     * @return string
     */
    public static function jsFile($src='') {

        $tag = "<script src='$src'></script>";

        return $tag;
    }
    public static function script($script,$param=[]) {

        $tag = "<script ".self::htmlOptions($param)." >$script</script>";

        return $tag;
    }
    /**
     * 
     * @param type $type
     * @param type $param
     * @return string
     */
    public static function input($type = 'text',$name='',$value='',$param = []) {

        $tag = "<input type='{$type}' value='$value' name='$name' ".self::htmlOptions($param)." />";

        return $tag;
    }
    
    public static function textarea($name,$value='',$param=[]){
        
        $tag = "<textarea name='$name' ".self::htmlOptions($param)." >$value</textarea>";
        
        return $tag;
        
    }
    
     /**
      * 
      * @param string $name
      * @param string|int $selected
      * @param array() $options
      * @param array() $param
      * @return string
      */
    public static function dropdowlist($name,$selected,$options=[],$param=[]){
        
        $tag = "<select id='$name' ".self::htmlOptions($param)." name='$name'>
                                    ".self::createOptions($options,$selected)."
        </select>";
       
        return $tag;
        
    }
    
    /**
     * 
     * @param array $options
     * @return string
     */
    public static function createOptions($options=[],$selected){
        
      $op = '<option   value="">Selecione</option>';  
      foreach($options as $value => $title){
              $sel = '';
              if($selected==$value)
                  $sel = 'selected';
          
          $op .= "<option {$sel} value='$value'>".$title."</option>";
          
      }
      return $op;
    }
     
    
    /**
     * 
     * @param type $value string
     * @param type $param array
     * @return string
     */
    public static function th($value,$param=[]){
        $tag =  "<th ".self::htmlOptions($param)." >$value</th>";
        return $tag;
    }
    /**
     * 
     * @param type $value string
     * @param type $param array
     * @return string
     */
    public static function td($value,$param=[]){
        $tag = "<td ".self::htmlOptions($param)." >$value</td>";
        return $tag;
    }
    /**
     * 
     * @param type $param array
     * @return string
     */
    public static function tr($param=[]){
        $tag = "<tr ".self::htmlOptions($param).">";
        return $tag;
    }
    /**
     * 
     * @return string
     */
    public static function endtr(){
        $tag = "</tr>";
        return $tag;
        
    }
    
    public static function table($thead='',$tbody='',$tfoot='',$param=[]){
        $table ="<div>"
                . "<table ".self::htmlOptions($param)." >"
                . "<thead>$thead</thead>"
                . "<tbody>$tbody</tbody>"
                . "<tfoot>$tfoot</tfoot>"
                . "</table>"
                . "</div>";
        
        return $table;
    }

}