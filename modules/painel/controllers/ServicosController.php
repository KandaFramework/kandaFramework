<?php
/**
 * @copyright (c) KandaFramework
 * @access public
 * 
 * 
 */
namespace modules\painel\controllers;


use modules\painel\models\Servico;
use helps\Session;
use modules\painel\models\search\ServicoSearch;
use help\User;

class ServicosController extends \app\Controller {

    public function behaviors() {
        return [
            'getClass' => User::rule(),
        ];
    }

    public function actionIndex() {


        $dataProvider = ServicoSearch::dataProvider();

        return $this->render('index', ['dataProvider' => $dataProvider]);
    }

    /**
     * @pulibc
     * 
     * Atualização do usuário
     * 
     * @return string Json
     * 
     */
    public function actionUpdate($id) {

        $model = $this->findModel($id);
     

        if (\Kanda::$request->post($model) &&  $model->save()) {

         Session::setflash('update', 'Alterado com sucesso');

            return $this->redirect('update', ['id' => $id]);
        } else {
            return $this->render('form', ['model' => $model]);
        }
    }

    public function actionCreate() {

        $model = new Servico();

        if (\Kanda::$request->post($model) && $model->save()) {

               Session::setflash('update', 'Cadastrado com sucesso');

            return $this->redirect('update', ['id' => $model->id]);
        } else {
            return $this->render('form', ['model' => $model]);
        }
    }

    public function actionDelete($id) {

        if (isset($id) && !empty($id)) {
            $model = $this->findModel($id);
            if ($model->delete()) {
                Session::setflash('delete', 'Excluído com sucesso');
                return $this->redirect();
            }
        }
    }

    /**
     * 
     * @param int $id
     * @return object
     */
    public function findModel($id) {

        if (!empty($id)) {
            $model = Servico::find($id);
            return $model;
        }
    }

}