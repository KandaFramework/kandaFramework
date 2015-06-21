<?php

/**
 * @copyright (c) KandaFramework
 * @access public
 * 
 * 
 */

namespace modules\kanda\models;

class KandaFramework{
     
    
    public static $primary_key = 'id';

    public $email;

    public static function rules() {

        return [
            [['password'],'required'],
            ['email','email','required','message'=>'Obrigatório','error'=>'Email inválido'],
            ['file', 'file', 'required','extension'=>"pdf|png|jpg", 'message' => 'Obrigatório', 'error' => 'Somente pdf, png, jpg'],
        ];
    }

    public static function attributeLabels() {

        return [
            'email' => 'E-mail',
            'id'    => 'Código'
        ];
    }
    
    /**
     * 
     * Exemplode de retorno de dados.
     */
    public static function findOne($id){
        
        $users =   [
           (object) ['id'=>1,'email'=>'kana1@gmail.com'],
           (object) ['id'=>2,'email'=>'kana2@gmail.com'],
           (object) ['id'=>3,'email'=>'kana3@gmail.com'],
           (object) ['id'=>4,'email'=>'kana4@gmail.com'],
           (object) ['id'=>5,'email'=>'kana5@gmail.com'],
           (object) ['id'=>6,'email'=>'kana6@gmail.com'],
        ];
        
        $kanda = new KandaFramework();
        
        foreach ($users as $key => $data){
             if($data->id == $id){
                 $kanda->email = $data->email;
             }
        }
        return $kanda;
        
    }

    public static function dataProvider(){
        
        $users =   [
           (object) ['id'=>1,'email'=>'kana1@gmail.com'],
           (object) ['id'=>2,'email'=>'kana2@gmail.com'],
           (object) ['id'=>3,'email'=>'kana3@gmail.com'],
           (object) ['id'=>4,'email'=>'kana4@gmail.com'],
           (object) ['id'=>5,'email'=>'kana5@gmail.com'],
           (object) ['id'=>6,'email'=>'kana6@gmail.com'],
           (object) ['id'=>7,'email'=>'kana7@gmail.com'],
        ];
        
        return array_merge(
            ['data'=>  User::all() ],
            self::attributeLabels(),['primary_key'=> self::$primary_key ]
        );

    }
    
}