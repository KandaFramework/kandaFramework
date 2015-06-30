<?php
static::$title = 'Usuários';

use helps\Url;
use helps\Session;
use widgets\GridView;
use modules\painel\models\Nivel;
 

?>
<div class="module">
    <div class="module-head">
        <h3><?php echo static::$title ?></h3>
        <a href="#"  data-toggle="modal" data-target="#myModal" onclick="Modal('<?php echo Url::to('create') ?>');" class="btn btn-small btn-success param">Cadastrar</a>
        
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
                                            'login',
                                            'email',                                            
                                        ],
                                        'actionColumns' => ['update', 'delete'],
                                    ]);

                                    echo Session::getflash('create');
                                    echo Session::getflash('delete'); 
                     ?>

                </div><!-- /.box-body -->
            </div><!-- /.box -->
        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content modal-lg">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Cadatrar</h4>
              </div>
              <div class="modal-body">
                
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Sair</button>
              </div>
            </div>
          </div>
        </div>

       <script>

       var Modal = function(url)
       {
        $.get(url,{},function(data){ 
            $('.modal-body').html(data);
         });
       }
      </script>