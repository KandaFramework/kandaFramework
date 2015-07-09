


#KandaFramework PHP

#Versão 2.1

#Observação

Conhecimentos básicos em MVC, namespace, ActiveRecord PHP

#Instação para Dev

Fazer um clone do projeto, a pasta application-dev contem os arquivos
da aplicação.

A execução do servidor php remoto em application-dev
 
#Instalação para testes e produção

1 composer require ksoftware/k2

2 Copiar os arquivos da pasta application para fora do vendor.

3 Configuração do projeto em /config/main.php

4 Para produção adicionar o arquivo .htaccess que encontra-se em vendor/ksoftware/k2

#Rodando

Para executar o projeto deve rodar o server remoto do php

Comando: php -S 0.0.0.0:8888 -t public/

Em produção utilizar o arquivo .htaccess, contem as configurações do host.

