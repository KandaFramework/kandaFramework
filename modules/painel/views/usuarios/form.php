<?php
static::$title = 'Usuários';

use widgets\FormWidget;
use helps\Url;
use helps\Session;
 
 

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
                $form = FormWidget::widget($model, [ 'style' => "\help\Style",]);

                echo $form->text('nome');
                echo $form->text('login');
                echo $form->text('email');
                echo $form->text('senha',['value' => '123'], 'password');
           
                ?>
                <div class="form-actions">
                    <button class="btn btn-success"  type="submit" >Enviar</button>
                </div>

            </fieldset>;
        </form> 
        <?php
        echo Session::getflash('update');
        ?>       
    </div>
</div>