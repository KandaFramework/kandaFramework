<?php
use widgets\FormWidget;
use helps\Url;
use helps\Session;
?>

<div class="row">
    <div class="module module-login span4 offset4">

        <form  action="<?php echo Url::to('/login') ?>" method="POST" class="form-vertical">
            <?php
            $form = FormWidget::widget($model,[]);
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
 <?php
        echo Session::getflash('error');
 