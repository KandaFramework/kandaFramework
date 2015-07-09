<?php
/**
 * @copyright (c) KandaFramework
 * @access public
 * 
 * 
 */
namespace modules\painel\controllers;

use modules\painel\models\Contato;

use modules\painel\models\search\ContatoSearch;
use help\User;
use helps\Session;


class ContatosController extends \app\Controller {
    
    public function behaviors() {
        return [
            'getClass' => User::rule(),
        ];
    }
    
    public function actionIndex() {
        
        $dataProvider = ContatoSearch::dataProvider();
        
        return $this->render('index', ['dataProvider' => $dataProvider]);
    }
    
    public function actionUpdate($id){
                 
      return $this->render('form', ['model' => $this->findModel($id)]);
        
    }
    public function actionDelete($id) {
        
    if(isset($id) && !empty($id)){
                $model =  $this->findModel($id);
          if($model->delete()){
            
              Session::setflash('delete','Deletado com sucesso');
              
            return $this->redirect();
              
            }
        }        
    }   
    
    public function actionGerarcsv($tipo=1){
         
        $model = Contato::find('all',['conditions'=>"tipo=$tipo"]);
          
        $csv = "nome;email;telefone;mensagem;criacao\n";
          
        foreach($model as $data)             
           $csv .= "{$data->nome};{$data->email};{$data->telefone};{$data->mensagem};".date('Y-m-d H:i:s',  strtotime($data->criacao))."\n";
   
        echo utf8_encode($csv); 
         
      #header('Content-type:application/csv');
         
      #header('Content-Disposition: attachment; filename="downloaded.csv"');
         
    }
    
    public function findModel($id){
        
        if(!empty($id)){
            $model = Contato::find($id);
            return $model;
        }
    }
       
}