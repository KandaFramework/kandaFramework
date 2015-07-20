<?php
/**
 * @copyright (c) KandaFramework
 * @access public
 * 
 * 
 */

namespace app\modules\painel\controllers;

use app\modules\painel\models\Usuario;
use kanda\helpers\Session;

 
class PainelController extends \kanda\web\Controller {

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
