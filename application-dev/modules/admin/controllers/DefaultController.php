<?php

namespace app\modules\admin\controllers;


use \kanda\web\Controller;

use app\modules\painel\models\Usuario;
use kanda\helpers\Session;
use kanda\helpers\Url;
use app\help\User;

class DefaultController extends Controller {

    public function behaviors() {
        return [
            'getClass' => User::rule(),
        ];
    }

    public function actionIndex() {
 
        return $this->render('index');
       

    }
    

}