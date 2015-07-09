<?php 
/**
 * @copyright (c) KandaFramework
 * @access public
 * 
 * 
 */
namespace modules\painel\controllers;
use helps\Session;


class LogaoutController extends \app\Controller{
    
    public function actionIndex(){
         
         Session::clear();
         
         return $this->redirect();

    }   
    
}