<main class="container">
    <h1>Update property</h1>

    <a href="/admin" class="btn-blue" style="margin-bottom: 2rem;">Return</a>

    <?php foreach($errors as $error) { ?>
      <div class="alert error">
        <?php echo $error; ?>
      </div>
    <?php } ?>

    <form class="form" method="POST" enctype="multipart/form-data">
      <?php include __DIR__ . '/form.php'; ?>
      <input type="submit" value="Update property" class="btn-blue">
    </form>
</main>
