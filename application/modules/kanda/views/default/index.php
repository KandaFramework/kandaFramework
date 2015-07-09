<?php

static::$title  = 'KandaFramework';

?>
<!-- Example row of columns -->
<div class="row">
  <div class="col-md-4">
    <h2>Versão</h2>
    <p>2.0.1 stable</p>
    <p>2.0</p>
    <p>1.1</p>
    <p>1.0</p>          
  </div>
  <div class="col-md-4">
    <h2>Arquitetura</h2>
    <div>
      <p>
       <strong>Configuração inicial.</strong>

       <ul>
         <li>
           <strong>config/main.php</strong>
           <p>
             Configuração do modulos,timezone e banco de dados
           </p>                  
         </li>
       </ul>  
     </p>           
     <p>
       <strong>Diretório root do framework.</strong>

       <ul>
         <li>

          <strong>public/</strong>
          <p>
            Para os arquivos publicos do sistema. Css, js, imagens
          </p>                   
        </li>
      </ul>  
    </p>
    <strong>Estrutura do modules</strong>
    <p>
     <ul>
      <li><strong>Controllers</strong>
        <p style="color:#439F9B">
          DefaultController              
        </p>
      </li>
      <li><strong>Models</strong></li>
      <li>
        <strong>Views</strong>
        <p style="color:#439F9B">
          layout/main.php<br/>
          default/index.php
        </p>
      </li>
      <li>
        <strong>Module.php</strong>
        <p>
          Configuração do namespace do module
        </p>
      </li>              
    </ul>
  </p>         

</div>

</div>
<div class="col-md-4">
  <h2>Começando</h2>
  <p>
    <strong>Rodando o servidor PHP</strong>
    <a href="http://php.net/manual/pt_BR/features.commandline.webserver.php"><span>leia mais</span></a>
  </p>
  <p>
   <strong style="color:#2F9E44"> php -S 0.0.0.0:8000 -t public/</strong>
 </p>
 </div>