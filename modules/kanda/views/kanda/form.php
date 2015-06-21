<?php
$this->title = 'Kanda Framework';

use widgets\FormWidget;
use helps\Url;
?>
<div class="starter-template">
    <h1>Kanda Framework MVC</h1>
    <p class="lead">Projeto em desenvolvimento. <br/>
        <strong>Alguns exemplos.</strong>
    </p>
</div>
<div id="form">
    <h2>Enviando dados pelo formulário</h2>
    <p>
      Exemplo basíco.
      Obs: Para que possa ser validado no method POST|GET, deve passar o objeto da class.
      Padrão para os nomes dos inputs para validação de ser class[nome do input]
      As configurações de validação sera aplicada na model.      
    </p><br/>
    <form id="Validade" method="POST" action="<?php echo Url::request() ?>" enctype="multipart/form-data">
        <?php
        
       $form =  FormWidget::widget($model,[
           'id'=>'Validade', 
        ]);
        
        ?>
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <?php echo $form->textFieldGroup('email',['class'=>'form-control','placeholder'=>'Email']); ?>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="KandaFramework[password]" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
        <div class="form-group">
            <label for="exampleInputFile">File input</label>
            <input name="KandaFramework[file]" type="file" id="exampleInputFile">
        </div>

        <button type="submit" class="btn btn-default">Submit</button>
    </form>
</div>
<br/>