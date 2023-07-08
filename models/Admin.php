<?php

namespace Model;

class Admin extends ActiveRecord {

  // Database
  protected static $table = 'users';
  protected static $columnsDB = ['id', 'email', 'password'];

  public $id;
  public $email;
  public $password;

  public function __construct($arr = []) {

    $this->id = $arr['id'] ?? null;
    $this->email = $arr['email'] ?? null;
    $this->password = $arr['password'] ?? null;

  }

  public function validate() {

    if(!$this->email) {
      self::$errors[] = 'Email is required';
    }
    if(!$this->password) {
      self::$errors[] = 'Password is required';
    }

    return self::$errors;

  }

  public function userExists() {

    // Checks if user exists
    $query = "SELECT * FROM " . self::$table . " WHERE email = '" . $this->email . "' LIMIT 1";
    $result = self::$db->query($query);

    if(!$result->num_rows) {
      self::$errors[] = 'User does not exist';
      return;
    }
    return $result;

  }

  public function checkPassword($result) {

    $user = $result->fetch_object();
    $auth = password_verify($this->password, $user->password);

    if(!$auth) {
      self::$errors[] = 'Incorrect password';
    }
    return $auth;

  }

  public function authUser() {

    session_start();

    // Fill session array
    $_SESSION['user'] = $this->email;
    $_SESSION['login'] = true;

    header('Location: /admin');

  }

}
