<?php

namespace Controllers;
use MVC\Router;
use Model\Property;
use Model\Seller;
use Intervention\Image\ImageManagerStatic as Image;

class PropertyController {

  public static function index(Router $router) {

    $properties = Property::all();

    $result = $_GET['result'] ?? null;

    $router->render('properties/admin', [
      'properties' => $properties,
      'result' => $result
    ]);
  }

  public static function create(Router $router) {

    $property = new Property;
    $sellers = Seller::all();

    // Array with error messages
    $errors = Property::getErrors();

    // Executes code after the user has submitted the form
    if($_SERVER['REQUEST_METHOD'] === 'POST') {

      // Creates a new instance
      $property = new Property($_POST['property']);

      /* UPLOADING FILES */

      // Generates unique name
      $img_name = md5(uniqid(rand(), true)) . ".jpg";

      // Resizes the image with Intervention & sets the image
      if($_FILES["property"]["tmp_name"]["image"]) {
        $image = Image::make($_FILES["property"]["tmp_name"]["image"])->fit(800,600);
        $property->setImage($img_name);
      }

      // Validates
      $errors = $property->validate();

      // Review that errors arrays is empty
      if(empty($errors)) {

        // Creates folder
        $folder_img = '../../images/';

        if(!is_dir(IMG_FOLDER)) {
          mkdir(IMG_FOLDER);
        }

        // Uploads image to server
        $image->save(IMG_FOLDER . $img_name);

        // Saves to db
        $property->save();

      }
    }

    $router->render('properties/create', [
      'property' => $property,
      'sellers' => $sellers,
      'errors' => $errors
    ]);
  }

  public static function update(Router $router) {
    $id = validateOrRedirect('/admin');
    $property = Property::find($id);

    $sellers = Seller::all();

    $errors = Property::getErrors();


    // POST method for update
    if($_SERVER['REQUEST_METHOD'] === 'POST') {

      // Assign attributes
      $arr = $_POST['property'];
      $property->synchronize($arr);

      // Validations
      $errors = $property->validate();

      // Generates unique name
      $img_name = md5(uniqid(rand(), true)) . ".jpg";

      // Uploading files
      if($_FILES['property']['tmp_name']['image']) {
        $image = Image::make($_FILES['property']['tmp_name']['image'])->fit(800,600);
        $property->setImage($img_name);
      }

      // Review that errors arrays is empty
      if(empty($errors)) {
        if($_FILES['property']['tmp_name']['image']) {
          // Stores image
          $image->save(IMG_FOLDER . $img_name);
        }

        $property->save();
      }
    }


    $router->render('/properties/update', [
      'property' => $property,
      'sellers' => $sellers,
      'errors' => $errors
    ]);
  }

  public static function delete() {

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
      // Validates id
      $id = $_POST['id'];
      $id = filter_var($id, FILTER_VALIDATE_INT);

      if($id) {

        $type = $_POST['type'];

        if(validateContentType($type)) {
          $property = Property::find($id);
          $property->delete();
        }

      }
    }

  }
}
