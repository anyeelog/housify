<main class="container section">
  <h1>Login</h1>

  <?php foreach($errors as $error) { ?>
    <div class="alert error"><?php echo $error; ?></div>
  <?php } ?>

  <form method="POST" class="form" action="/login">
      <label for="email">Email</label>
      <input type="email" name="email" id="email" placeholder="Your email">

      <label for="password">Password</label>
      <input type="password" name="password" id="password" placeholder="Your password">

      <input type="submit" value="Login" class="btn-yw">
  </form>
</main>
