<?php
/**
 * @copyright (c) KandaFramework
 * @access public
 * 
 * 
 */
namespace app\modules\painel\controllers;


use app\modules\painel\models\Usuario;
use app\modules\painel\models\Nivel;
use kanda\helps\Session;
use app\modules\painel\models\search\UsuarioSearch;
use help\User;

class UsuariosController extends \kanda\web\Controller {

    public function behaviors() {
        return [
        'getClass' => User::rule(),
        ];
    }

    public function actionIndex() {

        $dataProvider = UsuarioSearch::dataProvider();
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

        $defaultpasswork = $model->senha;

        if (\Kanda::$request->post($model)) {
            
            /*  if($model->senha <> "123")
                    $model->senha = password_hash($model->senha, PASSWORD_DEFAULT);
                 else
                 $model->senha = $defaultpasswork;*/

                 $model->save();
                 Session::setflash('update', 'Alterado com sucesso');

                 return $this->redirect();
                 
             } else {
                return $this->render('form', ['model' => $model]);
            }
        }

        public function actionCreate() {

            $model = new Usuario();

            if (\Kanda::$request->post($model)) {

                $model->senha = password_hash($model->senha, PASSWORD_DEFAULT);
                
                $model->save();

                Session::setflash('update', 'Cadastrado com sucesso');
                return $this->redirect(['update','id' => $model->id]);

            } else {

                return $this->render('form',['model' => $model]);
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
        
        public function actionFileUpload($id)
        {
            print_r($_FILES);
        }

    /**
     * 
     * @param int $id
     * @return object
     */
    public function findModel($id) {

        if (!empty($id)) {
            $model = Usuario::find($id);
            return $model;
        }
    }

}