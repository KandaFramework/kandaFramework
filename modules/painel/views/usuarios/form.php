<?php
static::$title = 'Usuários';

use widgets\FormWidget;
use helps\Url;
use helps\Session;
use helps\Html;
use helps\Assets;
use base\AbstractWidget;
 
class FileUploadDir extends AbstractWidget{


    private static $assets = null;

    //2
    public function __construct()
    {

        $assets = new Assets();
 
        $assets->base = WWW_ROOT .'/vendor/fileupload/assets/';
         
        $assets->basename = 'jQueryFileUpload';   
        
        $assets->js = [
            'js/vendor/jquery.ui.widget.js',
            'js/jquery.iframe-transport.js',
            'js/jquery.fileupload.js',            
        ]; 
         //Script para ser listado no final
        $assets->init();
    }
    //1
    static function class_name()
    {
       return new FileUploadDir();
    }
    //3
    public function begin($name,$value,$param='')
    {
      return static::gridBootstrap(Html::input('file',$name,$value,['class'=>'form-control']));
    }

    static function gridBootstrap($tag)
    {

        //Assets::createAssets(['alert(1)'],'js');
    // static::$assets->createAsset(['alert(1)'],'endAssets');   

     return '<div class="form-group">
                    '.$tag.'
                    <div class="progress">
                        <div class="progress-bar" style="width:0%;">
                        <span class="sr-only"></span>
                    </div>
                </div>
      </div>';
      
      

    }
    //4
    static function end()
    {
      
      return [''];          

    }

}
?>
 
<div class="module">
    <div class="module-head">
        <h3><?php echo static::$title ?></h3>
        <a href="<?php  echo Url::prev() ?>" class="btn btn-small btn-warning param">voltar</a>
    </div>
    <div class="module-body">

        <br>

        <form method="POST"  id="FormWidget" action=""  class="form-horizontal row-fluid" enctype="multipart/form-data" >
            <fieldset>
                <?php
                $form = FormWidget::begin($model, [ 'style' => "\help\Style",]);

                echo $form->field('nome')->text();
                echo $form->field('login')->text();
                echo $form->field('email')->text();
                echo $form->field('file')->widget(FileUploadDir::class_name());
                echo $form->field('senha')->text(['value'=>123],'password');
           
                ?>
                <div class="form-actions">
                    <button class="btn btn-success"  type="submit" >Enviar</button>
                </div>

            </fieldset>
        </form> 
        <?php
        echo Session::getflash('update');
        ?>       
    </div>
</div>