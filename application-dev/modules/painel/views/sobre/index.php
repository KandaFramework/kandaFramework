<?php
static::$title = 'Sobre';
use kanda\helpers\Url;
use kanda\helpers\Session;
?>
<style>
    .cleditorMain{
        width: 1050px !important;
    }
    .row-fluid .span12 {
        margin-left: 5px;    
    }
</style>
<div class="module">
    <div class="module-head">
        <h3><?php echo static::$title ?></h3>
    </div>
    <div class="module-body">
    <div class="control-group">
            <label for="basicinput" class="control-label">Sobre</label>
            <div class="controls">
                <form  method="POST" action="<?php echo Url::to('update') ?>">
                    <textarea  name="Sobre[descricao]" rows="5" class="span8"><?php echo $model->descricao ?></textarea>
                    <input class="btn btn-info " type="submit"  value='Atualizar' />
                </form>                
            </div>            
        </div>
    </div>
</div>
<?php
    echo Session::getflash('update');