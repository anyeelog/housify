<?php

namespace Controllers;
use MVC\Router;

class PropertyController {

  public static function index(Router $router) {
    $router->render('properties/admin');
  }

  public static function create() {
    echo "Create property";
  }

  public static function update() {
    echo "Updating property";
  }

}
