<?php
namespace MyApp\controllers;

class Home2
{
  protected $view;

  public function __construct($view)
  {
    $this->view = $view;  
  }
  public function index($request, $response)
  {
    $view = $this->view;
    print_r($view);
    return $response->getBody()->write('teste');
  }
}
