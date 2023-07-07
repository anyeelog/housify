<?php

namespace Controllers;
use MVC\Router;
use Model\Property;
use PHPMailer\PHPMailer\PHPMailer;


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

    if($_SERVER['REQUEST_METHOD'] === 'POST') {

      $input = $_POST['contact'];

      // Creating an instance of PHP MAiler
      $mail = new PHPMailer();

      // Configuration of SMTP (sending emails)
      $mail->isSMTP();
      $mail->Host = 'smtp.mailtrap.io';
      $mail->SMPTAuth = true;
      $mail->Username = '';
      $mail->Password = '';
      $mail->SMTPSecure = 'tls';
      $mail->Port = 2525;

      // Mail configuration
      $mail->setFrom('admin@housify.com');
      $mail->addAddress('admin@housify.com', 'Housify');
      $mail->Subject = 'You have a new message';

      // Enable HTML
      $mail->isHTML(true);
      $mail->CharSet = 'UTF-8';

      // Define content
      $content = '<html>';
      $content .= '<p>You have a new message</p>';
      $content .= '<p>Name :' . $input['name'] . '</p>';

      if($input['contact'] === 'phone') {

        $content .= '<p>Chose to be contacted by phone</p>';
        $content .= '<p>Phone number :' . $input['phone'] . '</p>';
        $content .= '<p>Contact date :' . $input['date'] . '</p>';
        $content .= '<p>Contact time :' . $input['time'] . '</p>';

      } else {

        $content .= '<p>Chose to be contacted by email</p>';
        $content .= '<p>Email :' . $input['email'] . '</p>';

      }

      $content .= '<p>Buying or Selling :' . $input['type'] . '</p>';
      $content .= '<p>Price or Budget : €' . $input['price'] . '</p>';
      $content .= '<p>Contact method :' . $input['contact'] . '</p>';
      $content .= '</html>';

      $mail->Body = $content;
      $mail->AltBody = 'Alternative text without HTML';

      // Send email
      if($mail->send()) {
        $message = "Message successfully sent.";
      } else {
        $message = "There was an error while sending the message.";
      }

    }

    $router->render('pages/contact', [
      'message' => $message
    ]);

  }


}
