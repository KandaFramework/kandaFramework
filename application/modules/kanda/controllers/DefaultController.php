<?php

namespace modules\kanda\controllers;


class DefaultController extends \app\Controller {

    public function actionIndex() {

    	$this->render('index');

    }
   
    public function actionContato(){

    	return $this->render('index');
    }

}
