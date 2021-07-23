<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';

$app = new \Slim\App([
  'settings' => [
    'displayErrorDetails' => true
  ]
]);


/* Response Types: headers, json, xml **************************************************/
/* Response Types: headers, json, xml **************************************************/
/* Response Types: headers, json, xml **************************************************/
/* Response Types: headers, json, xml **************************************************/
/* 
$container = $app->getContainer();
$container['ResponseTypes'] = function() { return new MyApp\controllers\ResponseTypes(); };
$app->get('/headers', 'ResponseTypes:responseHeaders');
$app->get('/json', 'ResponseTypes:responseJSON');
$app->get('/xml', 'ResponseTypes:responseXML');


$container['SomeClass'] = function() { return new MyApp\controllers\SomeClass(); };
$app->get('/core', 'SomeClass:core'); 
*/

/* MIDDLEWARES*************************************************************************** */
/* MIDDLEWARES*************************************************************************** */
/* MIDDLEWARES*************************************************************************** */
/* MIDDLEWARES*************************************************************************** */


/**************************************** Parando no middleware apenas
$app->add(
  function($request, $response, $next)
  {
    return $response->write('Fui barrado pelo middleware');
  }
);
*********************************************************************/


/**************************************** Atravessando o middleware e executando a aplicação
$app->add(
  function($request, $response, $next)
  {
    $response->write('Passei pelo middleware e fui para: ');
    return $next($request, $response);
  }
);
****************************************************************************************/


/****Atravessando o middleware executando a aplicação e tornando a executar o middleware
$app->add(
  function($request, $response, $next)
  {
    $response->write('Passei pelo middleware e fui para: ');
    $response = $next($request, $response);
    return $response->write('Voltei do core');
  }
);
******************************************************************************************/

/**************************************************exemplo com dois ou mais middlewares
$app->add(
  function($request, $response, $next)
  {
    $response->write('Inicio Midleware 1 >> ');
    $response = $next($request, $response);
    return $response->write(' >> Fim Midleware 1');
  }
);

$app->add(
  function($request, $response, $next)
  {
    $response->write('Inicio Midleware 2 >>');
    $response = $next($request, $response);
    return $response->write(' >> Fim Midleware 2');
  }
);

$app->add(
  function($request, $response, $next)
  {
    $response->write('Inicio Midleware 3 >>');
    $response = $next($request, $response);
    return $response->write(' >> Fim Midleware 3');
  }
);
**********************************************************************/

/* ILLUMINATE DATABASE  ******************************************************************************/
/* ILLUMINATE DATABASE  ******************************************************************************/
/* ILLUMINATE DATABASE  ******************************************************************************/
/* ILLUMINATE DATABASE  ******************************************************************************/

/* composer require illuminate/database *///*********************Comando para instalar a dependencia */

use Illuminate\Database\Capsule\Manager as Capsule;

$container = $app->getContainer();
$container['db'] = function()
{
  $capsule = new Capsule;
  
  $capsule->addConnection([
    'driver' => 'mysql',
    'host' => 'localhost',
    'database' => 'slim_illuminate',
    'username' => 'myuser',
    'password' => 'mypass',
    'charset' => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix' => '',
  ]);
  
  
  $capsule->setAsGlobal();
  $capsule->bootEloquent();
  
  return $capsule;
};

$app->get('/users', function(Request $request, Response $response)
{

  $db = $this->get('db');
/* **************************************************************Criando uma tabela
  $db->schema()->dropIfExists('users');
  $db->schema()->create('users', function($table)
  {
    $table->increments('id');
    $table->string('name');
    $table->string('email')->unique();
    $table->timestamps();
  }); */

  $db->table('users')->insert([
    'name' => 'Nil Pereira',
    'email' => '13@ok'
  ]);

  $db->table('users')->where('id', 1)->update([
    'name' => 'Diego Richard Lemos',
  ]);

  $db->table('users')->where('id', 5)->delete();

  $users  = $db->table('users')->get();

  return $response->withJson($users);

});

$app->run();
