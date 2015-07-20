<?php
static::$title = 'Abrir Chamado';

use kanda\helps\Html;
use kanda\helps\Url;
use kanda\helps\Session;

function Grid($content, $label) {

    return "<div class='control-group'>
            <label class='control-label' >$label</label>
            <div class='controls'>
                  $content
            </div>
            </div>";
}
?>

<div class="module">
    <div class="module-head">
        <h3><?php echo static::$title ?></h3>
                <a href="<?php echo Url::base() ?>" class="btn btn-small btn-success param">Voltar</a>
    </div>
    <div class="module-body">
       
        <br> 

        <form method="POST" id="Chamado" action="" class="form-horizontal row-fluid">
            <fieldset>  

                <?php
                echo Grid(Html::input('text', 'Chamado[name]', Session::getSession()->nome, ['class' => 'span8']), 'Nome');

                echo Grid(Html::input('text', 'Chamado[email]', Session::getSession()->email, ['class' => 'span8']), 'E-mail');
                $rules = '';
                $messages = '';
                foreach ($form as $key => $campo) {

                    $campo = (object) $campo;

                    if ($campo->required == 1) {
                        $rules .= "'Chamado[][$campo->type][$campo->id]':{required:true},";
                        $messages .= "'Chamado[][$campo->type][$campo->id]':{required:'Obrigatório.'},";
                    }

                    switch ($campo->type) {

                        case 1:
                        
                            echo Grid(Html::input('text', 'Chamado[][1][' . $campo->id . ']', '', ['class' => 'span8']), $campo->name);

                            break;
                        case 2:
                        
                            echo Grid(Html::dropdowlist('Chamado[][2][' . $campo->id . ']', '', $campo->dropdowlist, ['class' => 'span8']), $campo->name);
                            break;
                        case 3:

                            echo Grid(Html::textarea('Chamado[][3][' . $campo->id . ']', '', ['class' => 'span8 cleditor']), $campo->name);

                            break;
                        case 4:
                            echo Grid(Html::input('radio', 'Chamado[][4][' . $campo->id . ']', ['class' => 'span8']), $campo->name);
                            break;
                        case 5:
                            echo Grid(Html::input('checkbox', 'Chamado[][5][' . $campo->id . ']', ['class' => 'span8']), $campo->name);
                            break; //
                    }
                }
                ?>  
                <div class="form-actions">
                    <button class="btn btn-success" type="submit">Enviar</button>
                </div>
            </fieldset>
        </form>
    </div><!-- /.box-body -->
</div><!-- /.box-body -->
<script src="<?php echo $this->assets($theme) ?>scripts/jquery.validate.min.js" ></script>
<script>

            $('#Chamado').validate({
    rules:{
        <?php echo $rules ?>
    'Chamado[name]':{
    required:true,
    },
            'Chamado[email]':{
            required:true,
                    email: true
            },
    },
            messages:{
        <?php echo $messages ?>
            'Chamado[name]':{
            required:'Obrigatório.',
            },
                    'Chamado[email]':{
                    required:'Não pode ser vazio.',
                            email:'Por favor insira um endereço de e-mail válido.',
                    },
            },
            submitHandler: function(form){
            var dados = $(form).serialize();
                    $.ajax({
                    type: "POST",
                            url: "<?php echo Url::request() ?>",
                            data: dados,
                            dataType:'json',
                            success: function(data)
                            {
                                    if(data.result){
                                        Alert('success','Cadastrado com sucesso');
                                        document.getElementById('Chamado').reset();
                                    }
                            }
                    });
            }
    });
</script>