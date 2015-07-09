


#KandaFramework PHP

#Versão 2.1

#Observação

Conhecimentos básicos em MVC, namespace, ActiveRecord PHP

#Instação para desenvolvimento do framework

git clone https://github.com/KandaFramework/kandaframework.git

Para rodar o projeto, entrar na pasta application-dev e executar o servidor remoto php
 
 
#Instalação para testes e produção

1 composer require ksoftware/k2

2 Copiar os arquivos da pasta application para fora do vendor.

3 Configuração do projeto em /config/main.php

4 Para produção adicionar o arquivo .htaccess que encontra-se em vendor/ksoftware/k2

#Rodando


Servidor remoto do php

Exp: php -S 0.0.0.0:8888 -t public/
