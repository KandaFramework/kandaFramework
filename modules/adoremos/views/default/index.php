<?php
static::$title = 'Adoremos Escola De Musica';
?>
 
  <div class="row">
            <div class="slide"></div>
        </div>
        <br/>

<div class="row grid">

<?php 
  foreach ($servico as $data):
  
?>
<div class="col-md-4">
   <img  src="/assets/adoremos/images/regulagem1.png">
   <div class="texto">
    <span><?php echo $data->nome ?></span>
    <p>
     <?php echo $data->descricao ?>
    </p>
</div>
</div>
<?php endforeach ?>
 

</div><!-- row-->

<br/>

<div class="row">

<div class="col-md-4">
   <img  src="/assets/adoremos/images/regulagem1.png">
   <div class="texto">
    <span>Regulamento</span>
    <p>
      Trabalho com violão a mais de um ano!!!
    </p>
</div>
</div>
<div class="col-md-4">
 <img  src="/assets/adoremos/images/regulagem1.png">
 <div class="texto">
  <span>Regulamento</span>
  <p>
    Trabalho com violão a mais de um ano!!!
  </p>
</div>
</div>
<div class="col-md-4">
 <img  src="/assets/adoremos/images/regulagem1.png">
 <div class="texto">
  <span>Regulamento</span>
  <p>
    Trabalho com violão a mais de um ano!!!
  </p>
</div>
</div>
  
</div>






