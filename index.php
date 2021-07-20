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

$app->post('/usuario/adiciona', function (Request $request, Response $response, array $args) {
    
    //recupera $_POST
    $post = $request->getParsedBody();
    $nome = $post['nome'];
    $email = $post['email'];

    /* Insert no banco de dados */

    /* responde ao usuário */
    $response->getBody()->write($nome . '-' . $email);

    return $response;
});

$app->put('/usuario/atualiza', function (Request $request, Response $response, array $args) {
    
    //recupera $_POST
    $post = $request->getParsedBody();
    $id = $post['id'];
    $nome = $post['nome'];
    $email = $post['email'];

    /* UPDATE no banco de dados */

    /* responde ao usuário */
    $response->getBody()->write('Sucesso' . $id);

    return $response;
});

$app->delete('/usuario/remove/{id}', function (Request $request, Response $response) {
    
    //recupera dados
    $id = $request->getAttribute('id');

    /* DELETE no banco de dados */

    /* responde ao usuário */
    $response->getBody()->write('Removido' . $id);

    return $response;
});


$app->run();
