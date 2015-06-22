
KandaFramework MVC
 

#Executando

php -S 0.0.0.0:8888 -t public/

Obs: A pasta root do framework é public/ 

#Estrutura de diretórios do Framework

/config/main.php -> Configurações do db, rotas do Framework.

/controllers
/help/
	Image.php -> Para edição de imagens
	Style.php -> Para estilo do form 
	User.php  -> Para ser chamado nas class controllers

/models

/modules
    site/		
    	controllers/
		models/
		views/
			layout
			    main.php	
/web/
/public
	index.php
	httacess
	assets/
/vendor
      activerecord/
      kandaframework
      	   kanda/
      	   	assets/
      	   	app/
      	   	   Controller.php
      	   	   Model.php
      	   	   View.php
      	        helps/
      	          ....
      	        base/
      	        widgets/
       wideImage 	        
      	        
      
