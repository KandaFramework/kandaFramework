<?php
static::$title = 'Contatos';

use kanda\widgets\GridView;
use kanda\helpers\Html;
use kanda\helpers\Url;
use kanda\helpers\Session;
?>
<div class="module">
    <div class="module-head">
        <h3><?php echo static::$title ?></h3>


    </div>
    <div class="module-body">

        <br> 

        <?php
        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'dataTable'=>'dataTable',
            'classTable'=>'table',
            'columns' => [
                'nome',
                'email',
                'telefone',
                 'cri',
              
                    ],
                    'actionColumns' => ['update', 'delete'],
                ]);

                echo Session::getflash('delete');
                ?>
    </div>
</div>

