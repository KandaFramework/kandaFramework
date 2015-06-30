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
use modules\painel\models\Banner;


class BannerController extends \app\Controller {
 

  public function behaviors() {
    return [
    'getClass' => User::rule(),
    ];
  }

  public function actionIndex() {

    $model = new Banner();


    return $this->render('index',[
      'model'=> $model,
      'assets'=> $this->assets('site').'/images/banner/',
      ]);
  }

  public function actionFileUpload(){

   $model = new Banner();

   $file =    UploadFile::load($model,'file');

   $model->name = $file->name;
   $model->size = $file->size;
   $model->type = $file->type;

   $filename = static::getPath().$file->name;

   $image = WideImage::load($file->tmpName)
   ->resize(940,426)
   ->saveToFile($filename); 

   $model->save();



   $this->Json([
    'success'=> 'Enviado com sucesso!',
    ]);


 }

  static function getPath(){
    return WWW_ROOT.'/public/assets/site/images/banner/';
  }

 public function actionUpdate($id){

  return $this->render('form', ['model' => $this->findModel($id)]);

}
public function actionDelete($id) {

  if(isset($id) && !empty($id)){
    $model =  $this->findModel($id);

    $name = $model->name;

    if($model->delete()){

        unlink(static::getPath().$name);

        $this->Json([
          'success'=> $id,
          ]);

    }
  }        
}   

public function findModel($id){

  if(!empty($id)){
    $model = Banner::find($id);
    return $model;
  }
}

}