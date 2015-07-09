<?php
/**
 * @copyright (c) KandaFramework
 * @access public
 * 
 */
namespace modules\painel\models\search;

use modules\painel\models\Noticia;


class NoticiaSearch extends Noticia{
    
     
    public static function dataProvider(){
         
    $join = 'JOIN status s ON s.id=n.status_id'; 
     
    return array_merge(
                       ['data'=>parent::find('all',['from'=>'noticia n','select'=>'n.id,n.nome,s.nome as status','joins'=>$join])],
                       parent::attributeLabels(),['primary_key'=>parent::$primary_key, ]
            );
             
    }  
   
}