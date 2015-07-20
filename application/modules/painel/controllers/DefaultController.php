<?php

namespace app\modules\painel\controllers;


use \kanda\web\Controller;

use app\modules\painel\models\Usuario;
use kanda\helps\Session;
use kanda\helps\Url;

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