
KandaFramework MVC
 

#Executando

Obs: A pasta root do framework é public/

php -S 0.0.0.0:8888 -t public/
 

#Estrutura de diretórios do Framework

/config/main.php -> Configurações do db, rotas do Framework.

/backup/ Pasta para arquivos...

/controllers
/help/
	Image.php -> Para edição de imagens
	Style.php -> Para estilo do form 
	User.php  -> Para ser chamado nas class controllers

/models

/modules
	painel/
		controllers/
		models/
		views/
			layout
			    main.php
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
