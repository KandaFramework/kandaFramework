<?php
static::$title = 'Serviços';

use kanda\helps\Url;
use kanda\helps\Session;
use kanda\widgetsGridView;
use app\modules\painel\models\Nivel;
?>
<div class="module">
    <div class="module-head">
        <h3><?php echo static::$title ?></h3>
        <a href="<?php echo Url::to('create') ?>" class="btn btn-small btn-success param">Cadastrar</a>
        
    </div>
    <div class="module-body">
            
        <br>         <?php
                            echo GridView::widget([
                                'dataProvider' => $dataProvider,
                                'dataTable'=>'dataTable',
                                'classTable'=>'table',
                                'columns' => [
                                            'id',
                                            'nome',
                                            'descricao',
                                                                                    
                                        ],
                                        'actionColumns' => ['update', 'delete'],
                                    ]);

                                    echo Session::getflash('create');
                                    echo Session::getflash('delete');
                                    ?>

                </div><!-- /.box-body -->
            </div><!-- /.box -->
       