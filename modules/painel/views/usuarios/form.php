<?php
static::$title = 'Usuários';

use widgets\FormWidget;
use helps\Url;
use helps\Session;
use helps\Html;
use helps\Assets;
 
class FileUploadDir extends Assets{


    public function __construct()
    {
 
        $this->base = WWW_ROOT .'/vendor/fileupload/assets/';
         
        $this->basename = 'jQueryFileUpload';   
        
        $this->js = [
           // 'js/vendor/jquery.ui.widget.js',
            'js/jquery.iframe-transport.js',
            'js/jquery.fileupload.js',
        ]; 
         //Script para ser listado no final
        
        parent::init();   
    }

    static function class_name()
    {
       return new FileUploadDir();
    }

    public function begin($name,$value,$param='')
    {

        echo '<pre>';
        print_r($param);

     return Html::input('file',$name,$value);
    }

    public static function end()
    {
         Session::setSession([
                   'EndAssets' => "alert('certo');",
         ]);

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
                echo $form->field('file')->widget(FileUploadDir::class_name(),
                 [
                  'url'=> '',
                   'dataType' =>'json',
                   'progressall'=> "function (e, data) {
                    var progress = parseInt(data.loaded / data.total * 100, 10);
                    $('#progress .bar').css(
                    'width',
                    progress + '%'
                    );
                    },",
                 ]);
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