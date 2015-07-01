<?php
use helps\Url;    
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo static::$title ?></title>
    <link  href="/assets/painel/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link  href="/assets/painel/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link  href="/assets/painel/css/theme.css" rel="stylesheet">
    <link  href="/assets/painel/images/icons/css/font-awesome.css" rel="stylesheet">
    <link  href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
    <script src="/assets/painel/scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
    <script>


     var Alert =  function(Class,msg){

        setTimeout(function(){

            $('#Alert .alert').fadeOut("slow");
            $('#Alert .alert').removeClass(Class);

        },3000);
        window.scrollTo(3000, 0);
        $('#Alert .alert strong').html('');
        $('#Alert .alert').fadeIn();
        $('#Alert .alert').addClass('alert-'+Class);
        $('#Alert .alert strong').html(msg);
    };

</script>


</head>
<body>
   <div id="Alert">
    <div class="alert" style="display: none" >
        <strong></strong>
    </div>
</div>
<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container" style="margin-top:50px;">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                <i class="icon-reorder shaded"></i>
            </a>

            <a class="brand" href="<?php echo Url::createUrl() ?>">
                Site
            </a>    


            <div class="nav-collapse collapse navbar-inverse-collapse">

                <ul class="nav pull-right">

                    <li><a data-toggle="modal" data-target="#myModal" onclick="Modal('<?php echo Url::to('create') ?>')" href="#">
                        Cadastrar
                    </a></li>
                </ul>

            </div><!-- /.nav-collapse -->
        </div>
    </div><!-- /navbar-inner -->
</div><!-- /navbar -->

<div class="wrapper">
    <div class="container">
        <?php echo $content ?>
    </div>
</div><!--/.wrapper-->

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">
      <div class="modal-header">
        <button typemodal-dialog modal-lg="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Cadatrar Aluno</h4>
    </div>
    <div class="modal-body" style="padding:0;margin:0;">

    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Sair</button>
    </div>
</div>
</div>
</div>
<!-- Modal -->


<div class="footer">
    <div class="container">

    </div>
</div>
<script src="/assets/painel/bootstrap/js/bootstrap.min.js" ></script>

<script>

       var Modal = function(url)
       {
        $.get(url,{},function(data){ 
            $('.modal-body').html(data);
         });
       }
      </script>
</body>
</html>