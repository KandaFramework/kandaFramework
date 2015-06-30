<?php

namespace modules\painel\controllers;


use modules\painel\models\Usuario;
use helps\Session;

class DefaultController extends \app\Controller {

    public function actionIndex() {

    	 $model = new Usuario;
 
        if (empty(Session::getSession()->nome)) {

            $this->layout = 'login';
            return $this->render('login', ['model' => $model]);

        } else {
  
            return $this->render('index', [
                        'usuario' => $model->count(),
            ]);
        }

    }
    

}