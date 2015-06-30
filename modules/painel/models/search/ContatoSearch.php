<?php
/**
 * @copyright (c) KandaFramework
 * @access public
 * 
 */
namespace modules\painel\models\search;

use modules\painel\models\Contato;


class ContatoSearch extends Contato{

      
    public static function dataProvider($tipo=1){
     
    return array_merge(
                       ['data'=>  parent::find('all',['conditions'=>"tipo=$tipo",'select'=>"nome,id,email,status,telefone,date_format(criacao,'%d-%m-%Y as %H:%i') cri"]),],
                       Contato::attributeLabels(),['primary_key'=>parent::$primary_key, ]
            );
             
    } 
    
}