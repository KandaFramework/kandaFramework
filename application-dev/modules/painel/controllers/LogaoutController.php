<?php 
/**
 * @copyright (c) KandaFramework
 * @access public
 * 
 * 
 */
namespace app\modules\painel\controllers;
use kanda\helps\Session;


class LogaoutController extends \kanda\web\Controller{
    
    public function actionIndex(){
         
         Session::clear();
         
         return $this->redirect();

    }   
    
}