<?php

define('TEMPLATES_URL', __DIR__ . '/templates');
define('FUNCIONES_URL', __DIR__ . 'functions.php');
define('IMG_FOLDER', __DIR__ . '/../images/');

function includeTemplate(string $name, bool $intro = false) {
  include TEMPLATES_URL . "/{$name}.php";
}

function isAuth() {
  session_start();

  if(!$_SESSION['login']) {
    header('Location: /');
  }
}

function debug($var) {
  echo "<pre>";
  var_dump($var);
  echo "</pre>";

  exit;
}


// HTML escape
function s($html) : string {
  $s = htmlspecialchars($html);
  return $s;
}

// Validates type of content
function validateContentType($type) {
  $types = ['seller', 'property'];
  return in_array($type, $types);
}


// Shows messages

function showNotification($code) {
  $message = '';

  switch($code) {
    case 1:
      $message = 'Correctly created';
      break;
    case 2:
      $message = 'Correctly updated';
      break;
    case 3:
      $message = 'Correctly deleted';
      break;
    default:
      $message = false;
      break;

  }

  return $message;
}
