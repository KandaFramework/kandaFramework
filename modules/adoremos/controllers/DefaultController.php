<?php

/**
 * @copyright (c) KandaFramework
 * @access public
 * 
 * 
 */

namespace modules\adoremos\controllers;

use modules\painel\models\Servico;

use app\Controller;

class DefaultController extends Controller{

    public function actionIndex() {
                 
                $servico = Servico::all();
                return $this->render('index',['servico'=>$servico]);
    }


public function actionContato() {

                return $this->render('contato');
    }

    public function actionSobre() {

                return $this->render('sobre');
    }
    public function actionAulas() {

                return $this->render('aulas');
    }
 	
     public function actionProfessores() {

                return $this->render('professores');
    }

      
}