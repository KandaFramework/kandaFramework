<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edmin</title>
        <link  href="<?php echo $this->assets($theme) ?>bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link  href="<?php echo $this->assets($theme) ?>bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link  href="<?php echo $this->assets($theme) ?>css/theme.css" rel="stylesheet">
        <link  href="<?php echo $this->assets($theme) ?>images/icons/css/font-awesome.css" rel="stylesheet">
        <link  href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
        <script src="<?php echo $this->assets($theme) ?>scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
    </head>
    <body>

        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container" style="margin-top:50px;">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                        <i class="icon-reorder shaded"></i>
                    </a>

                    <a class="brand" href="<?php echo $this->createUrl() ?>">
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