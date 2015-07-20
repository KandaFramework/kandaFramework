<?php

/**
 * @copyright (c) KandaFramework
 * @access public
 * 
 */

namespace kanda\widgets;

use kanda\helps\Html;
use kanda\helps\Validate;

class FormWidget extends Validate{

    /**
     *
     * @var objct
     */
    private static $model;
    private static $labels = [];
    private static $className = '';
    private static $script = '';
    private static $style = '';
    private static $classInput = '';
    private static $classFile = '';
    private static $classTextarea = '';
    private static $classSelect = '';
    private static $validade_rules = '';
    private static $validade_message = '';
    private static $idForm = 'Validade';
    private static $ajax = '';
    private static $value = '';
    private static $column = '';
 
  
    public static function begin($model, $param = []) {
        /* Chamada no namespace */
        static::$model = $model;

        $class = explode("\\", get_class($model));

        static::$className = end($class);   


        if (isset($param['style'])) {

            $styleClass = new $param['style'];
            static::$style = $styleClass;
            static::$classInput = $styleClass->classInput;
            static::$classFile = $styleClass->classFile;
            static::$classTextarea = $styleClass->classTextarea;
            static::$classSelect = $styleClass->classSelect;
        }

        if (isset($param['id']))
            static::$idForm = $param['id'];

        if (method_exists($model, 'rules')) {
             parent::begin($model)->end();
        }

        if (method_exists($model, 'attributeLabels'))
            static::$labels = $model::attributeLabels();

        return new FormWidget($model);
    }

    public function field($column)
    {
          static::$value  = static::$model->$column;
          static::$column = $column;
          return $this;
    }

    /**
     * 
     * @param type $column
     * @param type $param
     * @param type $type
     * @return type
     */                
    public function text($param = [],$type = 'text') {
 
        $tag = Html::input($type, static::$className . "[".static::$column."]", static::$value, array_merge(['id' => static::$column, 'class' => static::$classInput], $param));

        if (static::$style) {
            return static::$style->grid(static::$column, $tag, static::$labels[static::$column]);
        } else
            return Html::label(static::$labels[static::$column]) . $tag;
    }
    /**
     * 
     * @param type $column
     * @param type $param
     * @return type
     */                
    public function file($param = []) {

        $tag = Html::input('file', static::$className . "[".static::$column."]", static::$value, array_merge([static::$column, 'class' => static::$classFile], $param));

        if (static::$style) {
            return static::$style->grid(static::$column, $tag, static::$labels[static::$column]);
        } else
            return Html::label(static::$labels[$column]) . $tag;
    }
    /**
     * 
     * @param type $column
     * @param type $param
     * @return type
     */                
    public function textarea($param = []) {

        $tag = Html::textarea(static::$className . "[".static::$column."]", static::$value, array_merge([static::$column, 'class' => static::$classTextarea], $param));

        if (static::$style) {
            return static::$style->grid(static::$column, $tag, static::$labels[static::$column]);
        } else
            return Html::label(static::$labels[static::$column]) . $tag;
    }

    /**
     * 
     * @param string $column Nome da Coluna
     * @param string/int  $selected Valor a ser selecionado
     * @param array  $options Valores a ser criado.<br/>Exemplo:<code>[1=>'Sim',2=>'Não']</code><br/>
     * @param array  $param Valores html que serar passado no <code><select></select></code>
     */
    public function dropDownListGroup($selected = '', $options = [], $param = []) {

        $tag = Html::dropdowlist(static::$className . "[".static::$column."]", $selected, $options, array_merge([static::$column, 'class' => static::$classSelect], $param));

        if (static::$style) {
            return static::$style->grid(static::$column, $tag, static::$labels[static::$column]);
        } else
            return Html::label(static::$labels[static::$column]) . $tag;
    }

    public function widget($classname,$param=[])
    {

       if (static::$style)
       {
       return  static::$style->grid(static::$className . "[".static::$column."]",$classname->begin(static::$className . "[".static::$column."]",static::$column,static::$value,$param), static::$labels[static::$column]); 
       }
       return $classname->begin(static::$className . "[".static::$column."]",static::$column,static::$value,$param);
       

    }


   function __destruct() {
        
   }

}