<?php

namespace Controllers;
use MVC\Router;
use Model\Admin;


class LoginController {

  public static function login(Router $router) {

    $errors = [];

    if($_SERVER['REQUEST_METHOD'] === 'POST') {

      $auth = new Admin($_POST);
      $errors = $auth->validate();

      if(empty($errors)) {
        // Verify if user exists
        $result = $auth->userExists();

        if(!$result) {
          $errors = Admin::getErrors();
        } else {
          // Verify password
          $auth->checkPassword($result);

          if($auth) {
            // Auth user
            $auth->authUser();
          } else {
            // In case of incorrect password
            $errors = Admin::getErrors();
          }
        }
      }
    }

    $router->render('auth/login', [
      'errors' => $errors
    ]);

  }

  public static function logout() {
    session_start();
    $_SESSION = [];
    header('Location: /');
  }

}
