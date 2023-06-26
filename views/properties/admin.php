<main class="container">
    <h1>Admin of Housify</h1>

    <?php
      if($result) {
        $message = showNotification(intval($result));
        if($message) { ?>
          <p class="alert success"><?php echo s($message); ?></p>
    <?php
        }
      }
    ?>




    <a href="/properties/create.php" class="button btn-yw">New property</a>
    <a href="/sellers/create.php" class="button btn-blue">New seller</a>

    <table class="properties">
      <thead>
        <tr>
          <th>ID</th>
          <th>Title</th>
          <th>Image</th>
          <th>Price</th>
          <th>Actions</th>
        </tr>
      </thead>

      <tbody>
        <?php foreach($properties as $property) { ?>
          <tr>
            <th><?php echo $property->id; ?></th>
            <th><?php echo $property->title; ?></th>
            <th>
              <img src="/images/<?php echo $property->image; ?>" alt="Property image" class="table-img">
            </th>
            <th>$<?php echo $property->price; ?></th>
            <th>
              <a href="admin/properties/update.php?id=<?php echo $property->id; ?>" class="btn-blue-block">Update</a>

              <form method="POST" class="w-100">
                <input type="hidden" name="id" value="<?php echo $property->id; ?>">
                <input type="hidden" name="type" value="property">
                <input type="submit" value="Delete" class="btn-red-block w-100">
              </form>
            </th>
          </tr>
        <?php } ?>
      </tbody>
    </table>
</main>
