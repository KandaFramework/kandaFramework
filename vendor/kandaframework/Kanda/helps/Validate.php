<?php
/**
 * @copyright (c) KandaFramework
 * @access public
 * 
 * 
 */
namespace helps;

class Validade{
    
    private static $validade_rules;
    private static $validate_message;
    private static $className;

    public static function jsValidade($rules_=[],$className,$idForm) {

        $message = 'Obrigátorio';
        self::$className = $className;
       
        foreach ($rules_ as $key => $rules) {

            if (is_array($rules[0])) {

                if ($rules[1] == 'required') {
                    self::CreateValidade($rules[0]);
                }
            } elseif (isset($rules[2]) && $rules[2] == "required" || isset($rules[1]) && $rules[1] == 'file') {

                if (isset($rules['message']))
                    $messages = $rules['message'];


                switch ($rules[1]) {
                    case 'varchar':

                        self::$validade_rules .= "'" . self::$className . "[$rules[0]]':'required',";
                        self::$validade_message .= "'" . self::$className . "[$rules[0]]':{required:'$messages'},";

                        break;
                    case 'integer':
                    case 'float':

                        self::$validade_rules .= "'" . self::$className . "[$rules[0]]':{required: true,number: true},";
                        self::$validade_message .= "'" . self::$className . "[$rules[0]]':{required:'$messages',number:'{$rules['error']}'},";

                        break;
                    case 'email':

                        self::$validade_rules .= "'" . self::$className . "[$rules[0]]':{required: true,email: true},";
                        self::$validade_message .= "'" . self::$className . "[$rules[0]]':{required:'$messages',email:'{$rules['error']}'},";

                        break;
                    case 'file':
                        $rule = 'false';
                        if (isset($rules[2]) && $rules[2] == 'required')
                            $rule = 'true';

                        self::$validade_rules .= "'" . self::$className . "[$rules[0]]':{required: $rule,extension:\"{$rules['extension']}\"},";
                        self::$validade_message .= "'" . self::$className . "[$rules[0]]':{required:'$messages',extension:'{$rules['error']}'},";
                        break;
                }
            }
        }
        self::createJsValidade(self::$validade_rules, self::$validade_message, $idForm);
    }
    
    private static function CreateValidade($rules) {

        $mensagem = 'Obrigatório.';

        foreach ($rules as $key => $name) {

            self::$validade_rules .= "'" . self::$className . "[$name]':'required',";
            self::$validade_message .= "'" . self::$className . "[$name]':{required:'$mensagem'},";
        }
    }

    private static function createJsValidade($rules, $messages, $id) {

        $jquery = Kanda_CORE . '/assets/js/jquery-v1.11.js';
        $jquery_validade = Kanda_CORE . '/assets/js/jquery.validate.min.js';
        $additional_methods = Kanda_CORE . '/assets/js/additional-methods.min.js';

        $ajax = '';
        if (!empty(self::$ajax)) {
            $succes = self::$ajax['success'];
            $ajax = "submitHandler: function( form ){ var dados = $( form ).serialize(); $.ajax({type: '" . self::$ajax['type'] . "',dataType:'" . self::$ajax['dataType'] . "',url: '" . self::$ajax['url'] . "',data: dados,success: function( data ){" . $succes('data') . "}})  }";
        }

        echo Html::script(file_get_contents($jquery));
        echo Html::script(file_get_contents($jquery_validade));
        echo Html::script(file_get_contents($additional_methods));
        echo Html::script("$('#$id').validate({rules:{ {$rules}},messages:{{$messages}},$ajax});");
    }
    
}