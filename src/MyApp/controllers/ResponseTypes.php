<?php
namespace MyApp\controllers;

class ResponseTypes
{
  public function responseHeaders($request, $response)
  {
    $response->write('Esse é um retorno header');
    return $response->withHeader('allow', 'PUT')
                    ->withAddedHeader('Content-Length', 10);
  }

  public function responseJSON($request, $response)
  {
    return $response->withJson([
      "nome" => "Diego Richard",
      "endereco" => "aqui"
    ]);
  }
  
  public function responseXML($request, $response)
  {
    $xml = file_get_contents('arquivo.xml');
    $response->getBody()->write($xml);
    return $response->withHeader('Content-Type', 'application/xml');
  }
}
