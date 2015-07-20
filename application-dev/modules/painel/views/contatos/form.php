<?php
static::$title = 'Contatos';

use kanda\widgets\FormWidget;
use kanda\helpers\Url;
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

                echo $form->text('nome');
                echo $form->text('email');
                 echo $form->text('telefone');
                echo $form->textarea('mensagem');
                ?>
             </fieldset>
        </form> 
        <?php
        ?>       
    </div>
</div>