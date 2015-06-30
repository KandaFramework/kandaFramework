<?php

/**
 * @copyright (c) KandaFramework
 * @access public
 * 
 */

namespace widgets;

use helps\Html;
use helps\Assets;

class FormWidget extends Assets{

    /**
     *
     * @var objct
     */
    private static $model;
    private static $labels = [];
    private static $rules = [];
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

    public function __construct() {
        
        $this->base = KANDA_ROOT .'/widgets/assets/';
         
        $this->basename = 'FormWidget';   
        
        $this->js = [
            'js/jquery-v1.11.js',
            'js/jquery.validate.min.js',
            'js/additional-methods.min.js',
         ]; 

         parent::begin(); 

    }

     

    public static function widget($model, $param = []) {
        /* Chamada no namespace */
        self::$model = $model;

        $class = explode("\\", get_class($model));

        self::$className = end($class);


        if (isset($param['style'])) {

            $styleClass = new $param['style'];
            self::$style = $styleClass;
            self::$classInput = $styleClass->classInput;
            self::$classFile = $styleClass->classFile;
            self::$classTextarea = $styleClass->classTextarea;
            self::$classSelect = $styleClass->classSelect;
        }

        if (isset($param['id']))
            self::$idForm = $param['id'];

        if (isset($param['ajax']))
            self::$ajax = $param['ajax'];

        if (method_exists($model, 'rules')) {
            self::$rules = $model::rules();
        }

        if (method_exists($model, 'attributeLabels'))
            self::$labels = $model::attributeLabels();

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

        $tag = Html::input($type, self::$className . "[$column]", self::$model->$column, array_merge(['id' => $column, 'class' => self::$classInput], $param));

        if (self::$style) {
            return self::$style->grid($column, $tag, self::$labels[$column]);
        } else
            return Html::label(self::$labels[$column]) . $tag;
    }
    /**
     * 
     * @param type $column
     * @param type $param
     * @return type
     */                
    public function file($column, $param = []) {

        $tag = Html::input('file', self::$className . "[$column]", self::$model->$column, array_merge(['id' => $column, 'class' => self::$classFile], $param));

        if (self::$style) {
            return self::$style->grid($column, $tag, self::$labels[$column]);
        } else
            return Html::label(self::$labels[$column]) . $tag;
    }
    /**
     * 
     * @param type $column
     * @param type $param
     * @return type
     */                
    public function textarea($column, $param = []) {

        $tag = Html::textarea(self::$className . "[$column]", self::$model->$column, array_merge(['id' => $column, 'class' => self::$classTextarea], $param));

        if (self::$style) {
            return self::$style->grid($column, $tag, self::$labels[$column]);
        } else
            return Html::label(self::$labels[$column]) . $tag;
    }

    /**
     * 
     * @param string $column Nome da Coluna
     * @param string/int  $selected Valor a ser selecionado
     * @param array  $options Valores a ser criado.<br/>Exemplo:<code>[1=>'Sim',2=>'Não']</code><br/>
     * @param array  $param Valores html que serar passado no <code><select></select></code>
     */
    public function dropDownListGroup($column, $selected = '', $options = [], $param = []) {

        $tag = Html::dropdowlist(self::$className . "[$column]", $selected, $options, array_merge(['id' => $column, 'class' => self::$classSelect], $param));

        if (self::$style) {
            return self::$style->grid($column, $tag, self::$labels[$column]);
        } else
            return Html::label(self::$labels[$column]) . $tag;
    }

}