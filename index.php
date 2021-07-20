<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';

$app = new \Slim\App;

$app->get('/usuario[/{id}]', function (Request $request, Response $response, array $args) {
    $id = $args['id'];
    $json = "Id: $id";
    $response->getBody()->write($json);

    return $response;
});

$app->get('/postagens[/{ano}[/{mes}]]', function (Request $request, Response $response, array $args) {
    $ano = $args['ano'];
    $mes = $args['mes'];
    $json = "Lista de ano: $ano, mês: $mes";
    $response->getBody()->write($json);

    return $response;
});

$app->get('/lista/{itens:.*}', function (Request $request, Response $response, array $args) {
    $itens = $args['itens'];

    $json = var_dump(explode("/", $itens));

    $response->getBody()->write($json);

    return $response;
});

/* Nomear rotas ***************************************************************************************************/
$app->get('/blog/afsrf/esgsgh/sgsdhg/sgsdg/{id}', function (Request $request, Response $response, array $args) {
  
  $id = $args['id'];
  
  $json = "Usuarios que acesso a rota nomeada: $id";
  
  $response->getBody()->write($json);
  
  return $response;
  
})->setName("blog");

$app->get('/meusite', function (Request $request, Response $response) {
  
  $route = $this->get('router')->pathFor('blog', ['id'=> '33']);
  
  $response->getBody()->write($route);
  
  return $response;
  
});
/* Nomear rotas ***************************************************************************************************/




/* Agrupar rotas ***************************************************************************************************/
$app->group('/v2', function () {
    
  $this->get('/usuario[/{id}]', function (Request $request, Response $response, array $args) {
    $id = $args['id'];
    $json = "Id: $id";
    $response->getBody()->write($json);

    return $response;
  });

  $this->get('/postagens[/{ano}[/{mes}]]', function (Request $request, Response $response, array $args) {
    $ano = $args['ano'];
    $mes = $args['mes'];
    $json = "Lista de ano: $ano, mês: $mes";
    $response->getBody()->write($json);

    return $response;
  });

  $this->get('/lista/{itens:.*}', function (Request $request, Response $response, array $args) {
    $itens = $args['itens'];

    $json = var_dump(explode("/", $itens));

    $response->getBody()->write($json);

    return $response;
  });

});
/* Agrupar rotas ***************************************************************************************************/

$app->run();

//Jamilton
// $app->get('/usuario[/{id}]', function ($request, $response) {

//   $id = $request->getAttribute('id');
//   echo "id: $id";
  
// });