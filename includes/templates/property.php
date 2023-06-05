<?php
  use App\Property;



  if($_SERVER['SCRIPT_NAME'] === '/property.php') {
    $properties = Property::all();
  } else {
    $properties = Property::get(3);
  }

?>


<div class="properties-container">
  <?php foreach($properties as $property) { ?>
    <div class="property">

      <img src="/images/<?php echo $property->image; ?>" alt="Property" loading="lazy">

      <div class="properties-content">
        <h3><?php echo $property->title; ?></h3>
        <p><?php echo $property->description; ?></p>
        <p class="price">$<?php echo $property->price; ?></p>

        <ul class="properties-icons">
          <li>
            <img class="icon" src="build/img/icono_dormitorio.svg" alt="Rooms icon">
            <p><?php echo $property->rooms; ?></p>
          </li>
          <li>
            <img class="icon" src="build/img/icono_wc.svg" alt="WC icon">
            <p><?php echo $property->bathrooms; ?></p>
          </li>
          <li>
            <img class="icon" src="build/img/icono_estacionamiento.svg" alt="Parking icon">
            <p><?php echo $property->parking; ?></p>
          </li>
        </ul>

        <a href="property.php?id=<?php echo $property->id; ?>" class="btn-yw-block">See property</a>
      </div> <!-- .properties-content -->
    </div> <!-- .property-->
  <?php } ?>
</div> <!-- .properties-container -->


<?php
  // Close DB connection
  mysqli_close($db);

?>
