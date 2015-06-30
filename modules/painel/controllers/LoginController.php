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
    
    public function actionLogin(){
         
        $model = new Usuario();
        
        
        if(\Kanda::$request->post($model)){
        
        $login    = $model->login;
        $password = $model->senha;
                          
        $user = Usuario::find('first',['login'=>$login]);
         
        if($user){
            
        if(password_verify($password,$user->senha)){
                $this->setSession($user);     
        }else{
          
            $this->Json([
                'msg'=>'login ou senha inválida','class'=>'warning'
            ]);
            
          } 
            
        }else{
            
        $this->Json([
            'class'=>'warning',
            'msg'=>'Usuário não encontrado!',            
         ]);
        }
        
       }
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
     'file'      =>  '/',
     'email'     =>  $objct->email,
    ]);
          
    //$_SESSION['idLog']     =  $idLog;
          
    parent::Json([
        'msg'=>'Aguarde...','success'=>1,'class'=>'success','page'=>$this->createUrl('painel'),
    ]);
     
 }
    
    
public function actionLogout(){
    
    $url = end($this->server());
        
    $logSistema = new LogSistema();
    
    if($url == 'logout'){
        
    $date = date('Y-m-d H:i:s');
      
    $update = ['saida'=>$date];
     
    $logSistema->setUpdate($update, $_SESSION['idLog']);
        
    session_destroy();
    Controller::location($this->createUrl());
    
  }
    
  }   
    
}