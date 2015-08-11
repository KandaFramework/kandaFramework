<?php
use kanda\widgets\FormWidget;
use kanda\helpers\Url;
use kanda\helpers\Session;
use kanda\fileupload\FileUpload;

?>
 
        <br/>
        <form method="POST"  id="FormWidget" action="<?php echo Url::request() ?>"  enctype="multipart/form-data" class="form-horizontal row-fluid" >
            <fieldset>
                <?php
                $form = FormWidget::begin($model, [ 'style' => "app\help\Style",]);

                echo $form->field('nome')->text();
                echo $form->field('login')->text();
                echo $form->field('email')->text();
                 echo $form->field('senha')->text(['value'=>123],'password');
           
                ?>
                <div class="form-actions">
                    <button class="btn btn-success"  type="submit" >Enviar</button>
                </div>

            </fieldset>
        </form>     