<?php
static::$title = 'Usuários';

use kanda\widgets\FormWidget;
use kanda\helps\Url;
use kanda\helps\Session;
use kanda\fileupload\FileUpload;

?>
 
<div class="module">
    <div class="module-head">
        <h3><?php echo static::$title ?></h3>
        <a href="<?php  echo Url::prev() ?>" class="btn btn-small btn-warning param">voltar</a>
    </div>
    <div class="module-body">

        <br>

        <form method="POST"  id="FormWidget" action="<?php echo Url::request() ?>"  enctype="multipart/form-data" class="form-horizontal row-fluid" >
            <fieldset>
                <?php
                $form = FormWidget::begin($model, [ 'style' => "app\help\Style",]);

                echo $form->field('nome')->text();
                echo $form->field('login')->text();
                echo $form->field('email')->text();
                echo $form->field('file')->widget(FileUpload::class_name(),
                [
                  'conditions'=>[
                      'url'=> Url::toRouter(['usuarios/file-upload','id'=>$model->id]),
                  ]
                    
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