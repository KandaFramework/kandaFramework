


#KandaFramework PHP

#Versão 2.1

#Observação

Conhecimentos básicos em MVC, namespace, ActiveRecord PHP

#Instalação para desenvolvimento

git clone https://github.com/KandaFramework/kandaframework.git

Para rodar o projeto, entrar na pasta application-dev e executar o servidor remoto php
 
 
#Instalação para testes e produção

1 composer require ksoftware/k2 ou

{

	"minimum-stability":"dev",
	"require": {
		"ksoftware/k2": "dev-master"
	}
}

2 Copiar os arquivos da pasta application para fora do vendor.

3 Configuração do projeto em /config/main.php


#Rodando


Servidor remoto do php

Exp: php -S 0.0.0.0:8888 -t public/
