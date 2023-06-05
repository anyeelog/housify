<?php

namespace Model;

class Seller extends ActiveRecord {

  protected static $table = 'seller';
  protected static $columnsDB = ['id', 'name', 'lastname', 'phone'];

  public $id;
  public $name;
  public $lastname;
  public $phone;

  public function __construct($args = []) {
    $this->id = $args['id'] ?? null;
    $this->name = $args['name'] ?? '';
    $this->lastname = $args['lastname'] ?? '';
    $this->phone = $args['phone'] ?? '';
  }

  public function validate() {

    if(!$this->name) {
      self::$errors[] = "Name is required";
    }

    if(!$this->lastname) {
      self::$errors[] = "Last name is required";
    }

    if(!$this->phone) {
      self::$errors[] = "Phone number is required";
    }

    if(!preg_match('/[0-9]{10}/', $this->phone)) {
      self::$errors[] = "Phone number not valid";
    }

    return Seller::$errors;
  }

}
