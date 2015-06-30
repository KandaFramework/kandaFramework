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
                    </div><!-- /.nav-collapse -->
                </div>
            </div><!-- /navbar-inner -->
        </div><!-- /navbar -->



        <div class="wrapper">
            <div class="container">
                <?php echo $content ?>
            </div>
        </div><!--/.wrapper-->

        <div class="footer">
            <div class="container">
      
            </div>
        </div>
        
             </body>
</html>