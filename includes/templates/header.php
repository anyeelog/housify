<?php

  if(!isset($_SESSION)) {
    session_start();
  }

  $auth = $_SESSION['login'] ?? false;


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Housify</title>
  <link rel="stylesheet" href="/build/css/app.css">
</head>
<body>

  <header class="header <?php echo $intro ? 'header-index' : ''; ?>">
    <div class="container container-header">
      <div class="bar <?php echo $intro ? 'bar-index' : ''; ?>">
        <!-- <a href="/"><img src="/build/img/logo.svg" alt="Housify logo"></a> -->
        <a href="/"><h1>Housify</h1></a>

        <div class="mobile-menu">
          <img src="/build/img/barras.svg" alt="Burger menu">
        </div>

        <nav class="navigation <?php echo $intro ? 'navigation-index' : ''; ?>">
          <a href="about.php">About us</a>
          <a href="properties.php">Properties</a>
          <a href="blog.php">Blog</a>
          <a href="contact.php">Contact</a>
          <?php if($auth) { ?>
            <a href="logout.php">Logout</a>
          <?php } ?>
          <!--
            Dark mode button
            <img src="/build/img/dark-mode.svg" class="dark-mode-btn" alt="Dark mode button">
          -->
        </nav>
      </div> <!-- .bar -->

      <?php if($intro) { ?>
        <div class="header-txt">
          <h1><span>Find your perfect future home.</span><br>Exclusive houses and apartments for sale</h1>
          <a href="properties.php" class="btn-yw header-btn">See properties</a>
        </div>
      <?php } ?>
    </div>
  </header>
