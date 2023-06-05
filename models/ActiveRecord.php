<?php

namespace Model;

class ActiveRecord {

  // DB
  protected static $db;
  protected static $columnsDB = [];
  protected static $table = '';

  // Errors
  protected static $errors = [];

  // Define DB connection
  public static function setDB($database) {
    self::$db = $database;
  }

  public function save() {

    if(!is_null($this->id)) {
      $this->update();
    } else {
      $this->create();
    }

  }

  public function create() {
    // Sanitize data
    $attributes = $this->sanitizeAttributes();

    // Insert into DB
    $query = "INSERT INTO " . static::$table . " ( ";
    $query .= join(', ', array_keys($attributes));
    $query .= " ) VALUES (' ";
    $query .= join("', '", array_values($attributes));
    $query .= " ') ";

    $result = self::$db->query($query);

    // Error or success message
    if($result) {
      // Redirect user on submit
      header('Location: /admin?result=1');
    }
  }

  public function update() {
    // Sanitize data
    $attributes = $this->sanitizeAttributes();

    $values = [];
    foreach($attributes as $key => $value) {
      $values[] = "{$key}='{$value}'";
    }

    $query = " UPDATE " . static::$table . " SET ";
    $query .= join(', ', $values);
    $query .= " WHERE id = '" . self::$db->escape_string($this->id) . "' ";
    $query .= " LIMIT 1 ";

    $result = self::$db->query($query);

    if($result) {
      // Redirect user on submit
      header('Location: /admin?result=2');
    }

  }

  // Deletes an entry
  public function delete() {
    $query = "DELETE FROM " . static::$table . " WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1";
    $result = self::$db->query($query);

    if($result) {
      $this->deleteImage();
      // Redirect user on submit
      header('Location: /admin?result=3');
    }
  }

  // Identifies and links attributes from db
  public function attributes() {
    $attributes = [];

    foreach(static::$columnsDB as $column) {
      if($column === 'id') continue;
      $attributes[$column] = $this->$column;
    }
    return $attributes;
  }

  public function sanitizeAttributes() {
    $attributes = $this->attributes();
    $sanitized = [];

    foreach($attributes as $key => $value) {
      $sanitized[$key] = self::$db->escape_string($value);
    }

    return $sanitized;
  }

  // Uploading files
  public function setImage($image) {

    //Deletes previous image
    if(!is_null($this->id)) {
      $this->deleteImage();
    }

    // Assign attribute of image the name of the image
    if($image) {
      $this->image = $image;
    }
  }

  // Deletes image
  public function deleteImage() {
    $fileExists = file_exists(IMG_FOLDER . $this->image);

    if($fileExists) {
      unlink(IMG_FOLDER . $this->image);
    }
  }

  // Validations
  public static function getErrors() {
    return static::$errors;
  }

  public function validate() {
    static::$errors = [];
    return static::$errors;
  }

  // Reads all the properties
  public static function all() {
    $query = "SELECT * FROM " . static::$table;
    $result = self::consultSQL($query);

    return $result;
  }

  // Get a limit number or entries
  public static function get($quantity) {
    $query = "SELECT * FROM " . static::$table . " LIMIT " . $quantity;
    $result = self::consultSQL($query);

    return $result;
  }

  // Searches property by id
  public static function find($id) {
    $query = "SELECT * FROM " . static::$table . " WHERE id = {$id}";
    $result = self::consultSQL($query);

    return array_shift($result);
  }


  public static function consultSQL($query) {
    // Consult DB
    $result = self::$db->query($query);

    // Iterate results
    $array = [];

    while($entry = $result->fetch_assoc()) {
      $array[] = static::createObject($entry);
    }

    // Free memory
    $result->free();

    // Return results
    return $array;
  }

  protected static function createObject($register) {
    $object = new static;

    foreach($register as $key => $value) {
      if(property_exists($object, $key)) {
        $object->$key = $value;
      }
    }

    return $object;
  }

  // Syncs the object in memory with the changes made by user
  public function synchronize($arr = []) {
    foreach($arr as $key => $value) {
      if(property_exists($this, $key) && !is_null($value)) {
        $this->$key = $value;
      }
    }
  }

}
