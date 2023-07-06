  <main class="container">
    <h1>Register a seller</h1>

    <a href="/admin" class="btn-blue" style="margin-bottom: 2rem;">Return</a>

    <?php foreach($errors as $error) { ?>
      <div class="alert error">
        <?php echo $error; ?>
      </div>
    <?php } ?>

    <form action="/sellers/create" class="form" method="POST">
      <?php include 'form.php'; ?>
      <input type="submit" value="Register seller" class="btn-blue">
    </form>
  </main>
