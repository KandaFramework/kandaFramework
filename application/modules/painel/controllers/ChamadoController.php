<?php

/**
 * @copyright (c) KandaFramework
 * @access public
 * 
 * 
 */

namespace app\modules\painel\controllers;

use kanda\helpers\Session;
use help\User;

class ChamadoController extends \kanda\web\Controller {

    private $create = 'http://inetsistemas.com.br/chamado/webservice/createchamado';
    private $form = 'http://inetsistemas.com.br/chamado/webservice/listForm';
    private $table = 'http://inetsistemas.com.br/chamado/webservice/listTable?clinte=';
    private $tramit = 'http://inetsistemas.com.br/chamado/webservice/listTramit?id=';
    private $tasks = 'http://inetsistemas.com.br/chamado/webservice/createTasks?tramit_id=';

    public function behaviors() {
        return [
            'getClass' => User::rule(),
        ];
    }

    public function actionChamado() {
 
        $url = $this->table . Session::getSession()->email;

        return $this->render('index', ['table' => $this->getArrayServer($url)]);
    }

    public function actionTramit($id) {

        $url = $this->tramit . $id . '&email=' . Session::getSession()->email;


        if (!empty($_POST['descricao'])) {

            $campo['Tasks']['descricao'] = $_POST['descricao'];
            $campo['Tasks']['title'] = $_POST['title'];

            $url = $this->tasks . $id . '&email=' . Session::getSession()->email;

            echo $this->setArrayServer($campo, $url);
        } else
            return $this->render('tramit', ['id' => $id, 'model' => $this->getArrayServer($url)]);
    }

    public function actionCreate() {


        if (!empty($_POST['Chamado']['name']) && !empty($_POST['Chamado']['email'])) {

            $url = $this->create;
            //temos que colocar os parâmetros do post no estilo de uma query string
            echo $this->setArrayServer($_POST, $url);
        } else {
            return $this->render('form', ['form' => $this->getArrayServer($this->form)]);
        }
    }
    
    
    public function getArrayServer($url) {

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

        $output = curl_exec($ch);

        curl_close($ch);

        return json_decode(trim($output), TRUE);
    }

    public function setArrayServer($campos,$url){
        
            $ch = curl_init();
            //configurando as opções da conexão curl
            curl_setopt($ch, CURLOPT_URL, $url);
            //este parâmetro diz que queremos resgatar o retorno da requisição
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($ch, CURLOPT_POST, count($campos));
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($campos, '', '&'));
            //manda a requisição post
            $resultado = curl_exec($ch);
            curl_close($ch);

            return $resultado;
        
    }

}
