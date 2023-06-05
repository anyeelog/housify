<?php

namespace Model;

class Property extends ActiveRecord {

  protected static $table = 'properties';
  protected static $columnsDB = ['id', 'title', 'price', 'image', 'description', 'rooms', 'bathrooms', 'parking', 'created', 'seller_id'];

  public $id;
  public $title;
  public $price;
  public $image;
  public $description;
  public $rooms;
  public $bathrooms;
  public $parking;
  public $created;
  public $seller_id;

  public function __construct($args = []) {
    $this->id = $args['id'] ?? null;
    $this->title = $args['title'] ?? '';
    $this->price = $args['price'] ?? '';
    $this->image = $args['image'] ?? '';
    $this->description = $args['description'] ?? '';
    $this->rooms = $args['rooms'] ?? '';
    $this->bathrooms = $args['bathrooms'] ?? '';
    $this->parking = $args['parking'] ?? '';
    $this->created = date('Y/m/d');
    $this->seller_id = $args['seller_id'] ?? '';
  }

  public function validate() {
    if(!$this->title) {
      self::$errors[] = "Title is required";
    }

    if(!$this->price) {
      self::$errors[] = "Price is required";
    }

    if(strlen($this->description) < 50) {
      self::$errors[] = "Description needs to have at least 50 characters";
    }

    if(!$this->rooms) {
      self::$errors[] = "Number of Rooms is required";
    }

    if(!$this->bathrooms) {
      self::$errors[] = "Number of Bathrooms is required";
    }

    if(!$this->parking) {
      self::$errors[] = "Number of Parkings is required";
    }

    if(!$this->seller_id) {
      self::$errors[] = "Choose a seller";
    }

    if(!$this->image) {
      self::$errors[] = "An image is required";
    }

    return self::$errors;
  }

}
