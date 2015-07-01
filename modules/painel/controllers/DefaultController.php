<?php

namespace modules\painel\controllers;


use \app\Controller;

use modules\painel\models\Usuario;
use helps\Session;
use helps\Url;

class DefaultController extends Controller {

    public function actionIndex() {

    	 $model = new Usuario;
 
        if (empty(Session::getSession()->nome)) {

            Session::setSession([
                    'token' => md5(date('d')),
            ]); 

           return $this->redirect(
            [
                'painel/login',
                'token'=> Session::getSession()->token,
            ]);

        } else {
  
            return $this->render('index', [
                        'usuario' => $model->count(),
            ]);
        }

    }
    

}