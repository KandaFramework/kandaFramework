<?php

use helps\Url;

?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <title><?php echo static::$title ?></title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="/assets/kanda/css/bootstrap.min.css">
        <link rel="stylesheet" href="/assets/kanda/css/style.css">
    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Kanda Framework</a>
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class=""><a href="<?php echo Url::createUrl() ?>">Home</a></li>
                        <li><a href="<?php echo Url::createUrl('contato') ?>">Contato</a></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>

          <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1>KandaFramework</h1>
        <p>
            Framework criado para ajudar programadores em aumentar seus conhecimentos na linguagem PHP.<br/>
            <strong>Básico de conhecimento</strong><br/>
            <ul>    
                <li>Arquitetura MVC</li>
                <li>Namespace</li>
                <li>ActiveRecord</li>
            </ul>
         </p>
        <p><a class="btn btn-primary btn-lg" href="https://github.com/KandaFramework/kandaframework" target="_black" role="button">GuitHub »</a></p>
      </div>
    </div>

        <div class="container">

            <?php echo $content ?>

        </div><!-- /.container -->
        <footer>
           <p>© Company <?php echo date('Y') ?></p> 
        </footer>
    </body>
</html>