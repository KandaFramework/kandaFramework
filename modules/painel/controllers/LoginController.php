<?php 
/**
 * @copyright (c) KandaFramework
 * @access public
 * 
 * 
 */
namespace modules\painel\controllers;
use modules\painel\models\LogSistema;
use modules\painel\models\Usuario;
use helps\Session;


class LoginController extends \app\Controller{

    public function actionIndex($token){

        $model = new Usuario();

        $this->layout = 'login';

        if(\Kanda::$request->post($model)){


            $login    = $model->login;
            $password = $model->senha;

            $user = Usuario::find('first',['login'=>$login]);

            if($user){

                if(password_verify($password,$user->senha)){
                    $this->setSession($user);     
                }else{

                  Session::setflash('error', 'login ou senha inválida');
                  $this->redirect();

              } 

          }else{

            Session::setflash('error', 'Usuário não encontrado!');
            $this->redirect();    

        }
        
    }else
        return $this->render('index',['model'=>$model]);
}
    /**
     * 
     * @param type $objct
     * 
     */
    public function setSession($objct){


    // $insert  = ['ip'=>$_SERVER['REMOTE_ADDR'],'browser'=>$_SERVER['HTTP_USER_AGENT'],'usuario'=>$array['user_id']];

    // $idLog = $this->logSistema->getLastId($this->logSistema->insert($insert,null,false));

        Session::setSession([
           'nome'      =>  $objct->nome,
           'login'     =>  $objct->login,
           'id'        =>  $objct->id,
           'email'     =>  $objct->email,
           ]);

           $this->redirect(['/']);

    }
    
    
    public function actionCreate(){

            $model = new Usuario();

            if(\Kanda::$request->post($model)){



            }else
              return $this->renderAjax('form',['model'=>$model]);
        }   
    
}