<?php

namespace Controllers;
use MVC\Router;
use Model\Property;



class PagesController {

  public static function index(Router $router) {

    $properties = Property::get(3);

    $router->render('pages/index', [
      'properties' => $properties,
      'intro' => true
    ]);

  }

  public static function about(Router $router) {
    $router->render('pages/about');
  }

  public static function properties(Router $router) {

    $properties = Property::all();

    $router->render('pages/properties', [
      'properties' => $properties
    ]);
  }

  public static function property(Router $router) {

    $id = \validateOrRedirect('/properties');
    $property = Property::find($id);

    $router->render('pages/property', [
      'property' => $property
    ]);
  }

  public static function blog(Router $router) {
    $router->render('pages/blog');
  }

  public static function entry(Router $router) {
    $router->render('pages/entry');
  }

  public static function contact(Router $router) {
    echo "From Index";
  }


}
