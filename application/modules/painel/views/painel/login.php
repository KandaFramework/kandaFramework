<?php
use widgets\FormWidget;



function Script(){
    
   return " var Class = data.class; setTimeout(function(){ $('.checkbox').html(''); if(Class == 'success'){ location.href=data.page;  }; },3000); if(Class ==='success'){ $('.checkbox').html(data.msg); }; if(Class ==='warning' ){ $('.checkbox').html(data.msg); }  ";
    
}

?>

<div class="row">
    <div class="module module-login span4 offset4">

        <form id="Validade" action="" method="POST" class="form-vertical">
            <?php
            $form = FormWidget::widget($model, [
                        'id' => 'Validade',
                        'ajax' => [
                            'url' => $this->createUrl('painel/login'),
                            'type' => 'POST',
                            'dataType' => 'json',
                            'success' => function($data) {
                                return Script();
                            },
                            'error' => function($data) {
                                
                            },
                        ],
            ]);
            ?>
            <div class="module-head">
                <h3>Login</h3>
            </div>
            <div class="module-body">
                <div class="control-group">
                    <div class="controls row-fluid">
                        <input type="text" placeholder="Login" name="Usuario[login]" id="inputEmail" class="span12">
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls row-fluid">
                        <input type="password" placeholder="Senha" name="Usuario[senha]" id="inputPassword" class="span12">
                    </div>
                </div>
            </div>
            <div class="module-foot">
                <div class="control-group">
                    <div class="controls clearfix">
                        <button type="submit" class="btn btn-primary pull-right">Login</button>
                        <label class="checkbox"></label>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>