<?php

namespace app\modules\kanda\controllers;

use kanda\web\Controller;

class DefaultController extends Controller {

    public function actionIndex() {

    	$this->render('index');

    }
   
    public function actionContato(){

    	return $this->render('index');
    }

}
