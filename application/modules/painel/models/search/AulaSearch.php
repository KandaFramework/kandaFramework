<?php
/**
 * @copyright (c) KandaFramework
 * @access public
 * 
 */
namespace app\modules\painel\models\search;

use app\modules\painel\models\Aula;


class AulaSearch extends Aula{

      
    public static function dataProvider(){
     
    return array_merge(
                       ['data'=>parent::find('all',['select'=>'nome,id'])],
                       parent::attributeLabels(),['primary_key'=>parent::$primary_key, ]
            );
             
    }  
    
}