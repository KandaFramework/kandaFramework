<?php
$this->title = 'Kanda Framework';


/**
 * Method para geração da table
 */
use widgets\GridView;

?>
<div class="starter-template">
    <h1>Kanda Framework MVC</h1>
    <p class="lead">Projeto em desenvolvimento. <br/>
        <strong>Alguns exemplos.</strong>
    </p>
</div>
<div id="table">
    <h2>Criação da table</h2>
    <p>
    Para que possa ser gerado a table os dados devem ser no formato object,
    foi herdado esse padrão do ActiveRecord.
      
    As configurações dos dados devem ser editadas na model, referente a classe
    Neste exemplo. Iremos utilizar a classe kandaFramework. que encontranse em seu 
    diretório de pasta do module, caso sera a configuração que foi escolhido na
    config/main.php
      
    </p><br/>
        <?php
        echo GridView::widget([
            'dataTable'=>false,
            'dataProvider' => $dataProvider,
            'result'=>25, 'count'=>$count,
            'classTable'=>'table-striped table-hover',
            'columns' => [
                'user_id',
                'email',
                'telefone'=>[ //Criando dinamicamente
                    'header'=>'Telefone',
                    'container'=>function($model,$id){
                        return $model->nivel->nome;
                    }
                ]
            ],
            'actionColumns' => ['update', 'delete'],
        ]);
        ?>
</div>
<br/>