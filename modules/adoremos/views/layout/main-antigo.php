<!DOCTYPE html>
<html lang='pt-Br'>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <title><?php echo $this->title ?></title>

  <link type="text/css" rel="stylesheet" href="<?php echo $this->assets($theme) ?>css/bootstrap.min.css" />
  <link rel="stylesheet" href="<?php echo $this->assets($theme) ?>css/coin-slider-styles.css" type="text/css" />
  <link type="text/css" rel="stylesheet" href="<?php echo $this->assets($theme) ?>css/estilo1.css"/>
  
 
  <!- - -->
</head>

<body id="corpo">

  <div id="recipiente">

   <div id="topo">
    <div id="logo">
      <img src="<?php echo $this->assets($theme) ?>images/logo.png" width="380" />
    </div>
    <div id="login">
     <div class="post">
       <div class="btn-sign">
        <a href="#login-box" class="login-window"><img src="<?php echo $this->assets($theme) ?>images/botaoaluno.png" /></a>
      </div>
    </div>
    <div id="login-box" class="login-popup">
      <a href="#" class="close"><img src="login-box-modal-dialog-window/close_pop.png" class="btn_close" title="Close Window" alt="Close" /></a>
      <form method="post" class="signin" action="#">
        <fieldset class="textbox">
         <label class="username">
          <span>Usuario</span>
          <input id="username" name="username" value="" type="text" autocomplete="on" placeholder="Username">
        </label>

        <label class="password">
          <span>Senha</span>
          <input id="password" name="password" value="" type="password" placeholder="Password">
        </label>

        <button class="submit button" type="button">Logar</button>

        <p>
          <a class="forgot" href="#">Esqueceu a Senha?</a>
        </p>

      </fieldset>
    </form>
  </div>

</div>
</div>

<div id="topomenu">
  <div id='cssmenu'>
    <ul>
     <li class='active'><a href='index.php'><span>Home</span></a></li>
     <li><a href=''><span>Sobre</span></a></li>
     <li><a href='#'><span>Aulas</span></a></li>
     <li class='last'><a href='#'><span>Professores</span></a></li>
     <li><a href='#'><span>Serviços</span></a></li>
     <li><a href='#'><span>Contatos</span></a></li>
   </ul>
 </div>
</div>
<div id="conteudo">
 <div id="cont1">
  <div id='coin-slider'>
    <a href="cursos.php" target="_blank"> <img src='<?php echo $this->assets($theme) ?>images/1.jpg'> </a>
    <a href="cursos.php" target="_blank"> <img src='<?php echo $this->assets($theme) ?>images/2.jpg'> </a>
    <a href="cursos.php" target="_blank"> <img src='<?php echo $this->assets($theme) ?>images/LOGO-1-PNG.png'> </a>
  </div>	
</div>		
<div id="cont2">
  Dicas
  <div id="video">
   <iframe width="320" height="300" src="//www.youtube.com/embed/09ykv-96pQs?list=UU44UDg23WQwTjm5cjUUmFDQ" frameborder="0" allowfullscreen></iframe>
   <iframe width="320" height="300" src="//www.youtube.com/embed/1YJ0vJ_6QrI?list=UU44UDg23WQwTjm5cjUUmFDQ" frameborder="0" allowfullscreen></iframe>
   <iframe width="320" height="300" src="//www.youtube.com/embed/3X5xE6Ix_cA?list=UU44UDg23WQwTjm5cjUUmFDQ" frameborder="0" allowfullscreen></iframe>
 </div>

</div>
<div id="cont3">
  Serviços
  <div id="imgservicos">
    <img src="<?php echo $this->assets($theme) ?>images/regulagem.png" />
    <img src="<?php echo $this->assets($theme) ?>images/eletrica.png" />
    <img src="<?php echo $this->assets($theme) ?>images/servicos.png" />
  </div>
</div>

<div id="rodape">
  <div id="rodapeesq"><img src="<?php echo $this->assets($theme) ?>images/logo.png" width="380" height="185"/> </div>
  <div id="socialradape">
    <img src="<?php echo $this->assets($theme) ?>images/facebook.png" />
    <img src="<?php echo $this->assets($theme) ?>images/twitter.png" />
    <img src="<?php echo $this->assets($theme) ?>images/youtube.png" />
  </div>
</div>
<div id="rodapedir">
 <img src="<?php echo $this->assets($theme) ?>images/rodapeendeço.png" />
 <p>© 2014 Todos os Direitos Reservados á Adoremos Escola de Música</p>

</div>
</div>

</div>
</div>	

<script type="text/javascript" src="<?php echo $this->assets($theme) ?>js/jquery-1.10.1.min.js"></script>
<script type="text/javascript" src="<?php echo $this->assets($theme) ?>js/coin-slider.min.js"></script>
<script type="text/javascript" src="<?php echo $this->assets($theme) ?>js/loginmoal.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#coin-slider').coinslider({ width: 1000,height:400, navigation:true,effect:'rain', delay: 5000,hoverPause: true });
  });
</script>
</body>

</html>
