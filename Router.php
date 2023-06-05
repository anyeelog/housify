<?php

namespace MVC;

class Router {

  public $routesGET = [];
  public $routesPOST = [];

  public function get($url, $fn) {
    $this->routesGET[$url] = $fn;
  }

  public function testRoutes() {
    $actualUrl = $_SERVER['PATH_INFO'] ?? '/';
    $method = $_SERVER['REQUEST_METHOD'];

    if($method === 'GET') {
      $fn = $this->routesGET[$actualUrl] ?? null;
    }

    if($fn) {
      // url exists and there's an associated function
      debug($this);
      call_user_func($fn, $this);
    } else {
      echo "Page not found";
    }

  }

  // View
  public function render($view) {
    include __DIR__ . "/views/$view.php";
  }

}
