<?php
static::$title = 'Contatos';

use widgets\FormWidget;
use helps\Url;
?>
<div class="module">
    <div class="module-head">
        <h3><?php echo static::$title ?></h3>
<a href="<?php echo Url::prev() ?>" class="btn btn-small btn-warning param">voltar</a>

    </div>
    <div class="module-body">

        <br> 


        <form method="POST" name=" " action="<?php echo Url::request() ?>" class="form-horizontal row-fluid" enctype="multipart/form-data" >
            <fieldset>
                <?php
                $form = FormWidget::widget($model, [
                            'style' => "\help\Style",
                ]);

                echo $form->textFieldGroup('nome');
                echo $form->textFieldGroup('email');
                 echo $form->textFieldGroup('telefone');
                echo $form->textareaFildGroup('mensagem');
                ?>
             </fieldset>
        </form> 
        <?php
        ?>       
    </div>
</div>