<?php

/**
 * @copyright (c) KandaFramework
 * @access public
 * 
 */

namespace widgets;

use helps\Html;
use helps\Validate;

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
 

    public static function widget($model, $param = []) {
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

        return new FormWidget();
    }
  

    /**
     * 
     * @param type $column
     * @param type $param
     * @param type $type
     * @return type
     */                
    public function text($column, $param = [], $type = 'text') {
 
 
        $tag = Html::input($type, static::$className . "[$column]", static::$model->$column, array_merge(['id' => $column, 'class' => static::$classInput], $param));

        if (static::$style) {
            return static::$style->grid($column, $tag, static::$labels[$column]);
        } else
            return Html::label(static::$labels[$column]) . $tag;
    }
    /**
     * 
     * @param type $column
     * @param type $param
     * @return type
     */                
    public function file($column, $param = []) {

        $tag = Html::input('file', static::$className . "[$column]", static::$model->$column, array_merge(['id' => $column, 'class' => static::$classFile], $param));

        if (static::$style) {
            return static::$style->grid($column, $tag, static::$labels[$column]);
        } else
            return Html::label(static::$labels[$column]) . $tag;
    }
    /**
     * 
     * @param type $column
     * @param type $param
     * @return type
     */                
    public function textarea($column, $param = []) {

        $tag = Html::textarea(static::$className . "[$column]", static::$model->$column, array_merge(['id' => $column, 'class' => static::$classTextarea], $param));

        if (static::$style) {
            return static::$style->grid($column, $tag, static::$labels[$column]);
        } else
            return Html::label(static::$labels[$column]) . $tag;
    }

    /**
     * 
     * @param string $column Nome da Coluna
     * @param string/int  $selected Valor a ser selecionado
     * @param array  $options Valores a ser criado.<br/>Exemplo:<code>[1=>'Sim',2=>'Não']</code><br/>
     * @param array  $param Valores html que serar passado no <code><select></select></code>
     */
    public function dropDownListGroup($column, $selected = '', $options = [], $param = []) {

        $tag = Html::dropdowlist(static::$className . "[$column]", $selected, $options, array_merge(['id' => $column, 'class' => static::$classSelect], $param));

        if (static::$style) {
            return static::$style->grid($column, $tag, static::$labels[$column]);
        } else
            return Html::label(static::$labels[$column]) . $tag;
    }

    public static function end(){


    }

}