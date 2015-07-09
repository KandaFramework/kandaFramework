<?php
  /**
   * @copyright (c) KandaFramework
   * @access public
   * 
   * 
   */
  namespace modules\painel\controllers;

  use help\User;
  use helps\UploadFile;
  use wideImage\WideImage;

  use modules\painel\models\Galeria;


  class GaleriasController extends \app\Controller {

    public function behaviors() {
      return [
      'getClass' => User::rule(),
      ];
    }

    public function actionIndex() {

      $model = new Galeria();

      return $this->render('index',[
        'model'=> $model,
        'assets' => $this->assets('site').'/images/galeria/220x144/',
        ]);
    }

    public function actionUpdate($id){

      return $this->render('form', ['model' => $this->findModel($id)]);

    }
    public function actionDelete($id) {

      if(isset($id) && !empty($id)){
        $model =  $this->findModel($id);

        $name = $model->name;

        if($model->delete()){

          unlink(static::getPath().'220x144/'.$name);
          unlink(static::getPath().'765x600/'.$name);

          $this->Json([
            'success' => $id,
            ]);
        }
      }        
    }   

    public function actionFileUpload(){

     $model = new Galeria();

     $file =    UploadFile::load($model,'file');

     if(empty($file))
      $this->Json([
        'error' => 'Error! Deve conter uma imagem!',
        ]);


    $name = strtolower($file->name);

    $model->name = $name;
    $model->size = $file->size;
    $model->type = $file->type;


    $filename1 = static::getPath().'220x144/'.$name;
    $filename2 = static::getPath().'765x600/'.$name;

    $image = WideImage::load($file->tmpName)
    ->resize(220,144)
    ->saveToFile($filename1); 

    $image = WideImage::load($file->tmpName)
    ->resize(765,600)
    ->saveToFile($filename2); 

    $model->save();

    $this->Json([
      'success'=> 'Enviado com sucesso!',
      ]);


  }

  static function getPath(){

    $path =  WWW_ROOT.'/public/assets/site/images/galeria/';
     return $path;
  }

  public function findModel($id){

    if(!empty($id)){
      $model = Galeria::find($id);
      return $model;
    }
  }

}