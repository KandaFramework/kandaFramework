<?php 
/**
 * @copyright (c) KandaFramework
 * @access public
 * 
 * 
 */
namespace app\modules\painel\models;

class Contato extends \ActiveRecord\Model {

    static $table_name = 'contato';
    static $primary_key = 'id';
   
     public static function rules() {

        return [
                 [['nome','telefone','status'],'required'],
                 ['email','email','required','message'=>'Obrigatório','error'=>'Email inválido'],
                 [['mensagem'],'varchar'],
        ];
    }   
    
    public static function attributeLabels(){
        
        return [
            'nome' => 'Nome',
            'email' => 'E-mail',
            'telefone' => 'Telefone',
            'mensagem' => 'Mensagem',  
            'assunto' => "Assunto",
            'status'=>'Status',
            'cri'=>'Criação'
        ];
    }
}