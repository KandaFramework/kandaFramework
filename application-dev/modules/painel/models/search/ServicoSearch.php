<?php
/**
 * @copyright (c) KandaFramework
 * @access public
 * 
 */
namespace modules\painel\models\search;

use modules\painel\models\Servico;


class ServicoSearch extends Servico{

      
    public static function dataProvider(){
     
    return array_merge(
                       ['data'=>parent::find('all',['select'=>'nome,id,descricao'])],
                       parent::attributeLabels(),['primary_key'=>parent::$primary_key, ]
            );
             
    }  
    
}