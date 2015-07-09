<?php
static::$title = 'Tramit';

use helps\Url;

$status = ['', 'Aberto', 'Concluído', 'Pendente', 'Andamento'];
?>
<div class="module">
    <div class="module-head">
        <h3><?php echo static::$title ?></h3>
        <a href="<?php echo Url::base() ?>" class="btn btn-small btn-success param">voltar</a>
    </div>
    <div class="module-body">
        <br/>
        <?php
        foreach ($model[$id] as $tramit_id => $data) {
            ?>
            <div class="media stream">
                <a class="media-avatar medium pull-left" href="#">
                    <img src="<?php echo $this->assets($theme) ?>images/user.png">
                </a>
                <div class="media-body">
                    <div class="stream-headline">
                        <h5 class="stream-author">
                            <?php echo $data['username'] ?>
                            <small><?php echo date('d-m-Y H:i', $data['date']) ?></small>
                        </h5>
                        <div class="stream-text">
                            <?php echo $data['descricao'] ?>
                        </div>
                    </div><!--/.stream-headline-->

                    <div class="stream-options">
                        <a class="btn btn-small" href="#">
                            <i class="icon-comment shaded"></i>
                            <?php echo $status[$data['status']] ?>
                        </a>                         
                    </div>
                    <?php if ($data['status'] <> 1): ?>
                        
                       <?php
                        if($model['tasks'][$data['id']]):
                        foreach ($model['tasks'][$data['id']] as $res):
                        ?>
                        <div class="media stream">
                            <a class="media-avatar small pull-left" href="#">
                                <img src="<?php echo $this->assets($theme) ?>images/user.png">
                            </a>
                            <div class="media-body">
                                <div class="stream-headline">
                                    <h5 class="stream-author">
                                        <?php echo $res['username'] ?>
                                        <small><?php echo date('d-m-Y H:i', $res['date']) ?></small>
                                    </h5>
                                    <h5><?php echo $res['title'] ?></h5>
                                    <div class="stream-text">
                                        <?php echo $res['descricao'] ?>
                                    </div>
                                </div><!--/.stream-headline-->
                            </div>
                        </div>
                        <?php  endforeach;                endif; 
                        if($data['comment'] == 1): 
                        ?>
                        <div class="stream-respond">
                            <div class="media stream">
                                <div class="row-fluid">
                                    <input id="title_<?php echo $data['id'] ?>" type="text" placeholder="Titulo" style="width: 556px;" />
                                    <textarea placeholder="Descrição" id="descricao_<?php echo $data['id'] ?>" style="height: 70px; resize: none;" class="span12"></textarea>
                                    <button type="button" onclick="Tasks(<?php echo $data['id'] ?>);return false;" class="btn btn-primary pull-right">enviar</button>
                                </div>
                            </div><!--/.media .stream-->

                        </div><!--/.stream-respond-->
                    <?php endif;                    endif; ?>
                </div>
            </div>
            <?php
         }
        ?>
    </div>
</div>
<script>

 var Tasks =  function(tramit_id){
     
     if(tramit_id != ''){
         
         var descricao = $('#descricao_'+tramit_id).val();
         var title     = $('#title_'+tramit_id).val();
         
         $.post('<?php echo Url::base("tramit/") ?>'+tramit_id+'',{descricao:descricao,title:title},function(data){
            
             if(data.result){
                 location.reload();
             }
              
         },'JSON');
         
     }else
         return false;
     
 }
 
</script>