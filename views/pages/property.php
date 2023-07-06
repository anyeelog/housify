<main class="container section container-centered">

  <h1><?php echo $property->title; ?></h1>

  <img src="images/<?php echo $property->image; ?>" alt="Image of property" lazy="loading">


  <div class="property-sum">
    <p class="price">$<?php echo $property->price; ?></p>

    <ul class="properties-icons">
      <li>
        <img src="build/img/icono_dormitorio.svg" alt="Rooms icon">
        <p><?php echo $property->rooms; ?></p>
      </li>
      <li>
        <img src="build/img/icono_wc.svg" alt="WC icon">
        <p><?php echo $property->bathrooms; ?></p>
      </li>
      <li>
        <img src="build/img/icono_estacionamiento.svg" alt="Parking icon">
        <p><?php echo $property->parking; ?></p>
      </li>
    </ul>

    <p><?php echo $property->description; ?></p>
  </div>

</main>
