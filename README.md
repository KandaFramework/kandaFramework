
KandaFramework MVC

#Instação para desenvolvimento

Fazer um clone do projeto, a pasta application-dev contem os arquivos
para da aplicação


 
#Instalação para teste

1 composer require ksoftware/k2

2 Copiar os arquivos da pasta application para fora do vendor.


#Arquivo de configuração inicial

config/main.php

Contem as configurações dos modulos, db.

#Rodando

Para executar o projeto deve ser aplicado o server remoto do php

php -S 0.0.0.0:8888 -t public/

Em produção utilizar o arquivo .htaccess, contem as configurações do host.

