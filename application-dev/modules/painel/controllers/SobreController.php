<?php
/**
 * @copyright (c) KandaFramework
 * @access public
 * 
 * 
 */
namespace app\modules\painel\controllers;

use app\modules\painel\models\Sobre;
use help\User;
use kanda\helpers\Session;

class SobreController extends \kanda\web\Controller{
    
    private static $id;
    
    public function behaviors() {
        return [
            'getClass' => User::rule(),
        ];
    }
    
    public function actionIndex(){
        
                
        $model = $this->findModel(1);
            
          return $this->render('index',['model'=>$model]);
    }  
    
    public function actionUpdate(){
        
        $model = $this->findModel(1);
        
        if(\Kanda::$request->post($model) && $model->save()){  
                Session::setflash('update', 'Alterado com sucesso');
                return $this->redirect();
          }else
             return $this->redirect(); 

        
    }   
    
    public function findModel($id=''){
        
        if(!empty($id)){
            $model = Sobre::find($id);
            return $model;
        }
    }
    
}