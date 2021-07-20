# MyFirst-API-With-SlimFramework
Welcome to pratice

##Install composer
```
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === '756890a4488ce9024fc62c56153228907f1545c228516cbf63f885e036d37e9a59d27d63f46af1d4d07ee0f76181c7d3') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"
```
##Install Slim Framework
```
php composer.phar require slim/slim:3.*
```
##CONFIG .htaccess
```
RewriteEngine on
RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule . index.php [L]
```

##Aula 534 - Rotas com Slim
-rotas com parametros requeridos e opcionais
-nomeando rotas
-agrupando rotas

##Aula 535 - Tipos de requisição
-GET (selects on database)
-POST (inserts on database)
-PUT (updates on database)
-DELETE (deletes on database)

##Aula 536 - Serviços e dependências

Nesta aula configuramos o autoload psr4 no compose.json e utilizamos o comando a seguir para recarreagar os arquivos autoload

```
php composer.phar dumpautoload
```