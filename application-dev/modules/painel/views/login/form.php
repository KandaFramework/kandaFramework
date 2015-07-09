<?php
use widgets\FormWidget;
use helps\Url;
use helps\Session;
 

?>
 

     <form method="POST"  id="Validade" action=""  class="form-horizontal row-fluid" enctype="multipart/form-data" >
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

            </fieldset>
        </form>       