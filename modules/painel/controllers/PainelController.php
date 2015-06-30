<?php
/**
 * @copyright (c) KandaFramework
 * @access public
 * 
 * 
 */

namespace modules\painel\controllers;

use modules\painel\models\Usuario;
use helps\Session;

 
class PainelController extends \app\Controller {

    public function actionPainel() {
             
 
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

    public function actionLogaout() {

        session_destroy();
        $this->actionPainel();
    }

}
