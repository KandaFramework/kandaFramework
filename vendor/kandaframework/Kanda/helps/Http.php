<?php

namespace helps;

class Http {

    public static function run() {
        return new Http();
    }

    /**
     * 
     * @param type $model
     * 
     * Verificar as passagem dos parametros no POST ou GET
     */
    public static function post($model) {


        if ($_SERVER['REQUEST_METHOD'] == 'POST') {


            $className = explode("\\", get_class($model));

            $className = end($className);

            $arrays = [];

            if (method_exists($model, 'rules')) {

                $param = [];

                if (isset($_POST[$className]) && !empty($_POST[$className])) {

                    $rules = self::getRules($model::rules());


                    foreach ($rules as $key => $rule) {

                        if (isset($_POST[$className][$rule])) {
                            /**
                             * Carregando os valores 
                             */
                            $model->$rule = $_POST[$className][$rule];
                            unset($_POST[$className][$rule]);
                        }
                    }
                    $_POST[$className];
                    return $model;
                }
            }
        }
    }

    
    public static function get($model) {


        if ($_SERVER['REQUEST_METHOD'] == 'GET') {


            $className = explode("\\", get_class($model));

            $className = end($className);

            $arrays = [];

            if (method_exists($model, 'rules')) {

                $param = [];

                if (isset($_GET[$className]) && !empty($_GET[$className])) {

                    $rules = self::getRules($model::rules());


                    foreach ($rules as $key => $rule) {

                        if (isset($_GET[$className][$rule])) {
                            /**
                             * Carregando os valores 
                             */
                            $model->$rule = $_POST[$className][$rule];
                            unset($_GET[$className][$rule]);
                        }
                    }
                    $_GET[$className];
                    return $model;
                }
            }
        }
    }
    
    public static function getRules($rules) {

        $rule = [];

        if (!is_array($rules[0]))
            return $rules;

        foreach ($rules as $key => $data) {

            if (is_array($data[0])) {
                $rule = array_merge_recursive($rule, $data[0]);
            } else
                array_push($rule, $data[0]);
        }
        return $rule;
    }

}
