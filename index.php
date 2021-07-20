<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';

$app = new \Slim\App([
  'settings' => [
    'displayErrorDetails' => true
  ]
]);

/* CONTAINER DEPENDENCE INJECTION */
class Servico{}
/* container pimple */
$container = $app->getContainer();
$container['servico'] = function()
{
  return new Servico;
};

$app->get('/servico', function (Request $request, Response $response, array $args) {
  
  $servico = var_dump($this->get('servico'));
  $response->getBody()->write($servico);
  
  return $response;
});



/* CONTROLLERS COMO SERVICO */

// Metodo 1
$container['View'] = function()
{
  return new MyApp\View;
};

$app->get('/servico2', '\MyApp\controllers\Home:index');

//Metodo 2
$container['Home2'] = function()
{
  return new MyApp\controllers\Home2(new MyApp\View);
};

$app->get('/servico3', 'Home2:index');

$app->run();
