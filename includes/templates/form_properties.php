<fieldset>
        <legend>General Information</legend>

        <label for="title">Title:</label>
        <input type="text" id="title" name="property[title]" value="<?php echo s($property->title); ?>" placeholder="Property Title">

        <label for="price">Price</label>
        <input type="number" id="price" name="property[price]" value="<?php echo s($property->price); ?>"  placeholder="Property Price">

        <label for="image">Image:</label>
        <input type="file" id="image" name="property[image]" accept="image/jpeg, image/png">

        <?php if($property->image) { ?>
          <img src="/images/<?php echo $property->image ?>" class="image-small">
        <?php } ?>

        <label for="description">Description:</label>
        <textarea id="description" name="property[description]"><?php echo s($property->description); ?></textarea>
      </fieldset>

      <fieldset>
        <legend>Property's Information</legend>

        <label for="rooms">Rooms:</label>
        <input
          type="number"
          id="rooms"
          name="property[rooms]"
          value="<?php echo s($property->rooms); ?>"
          placeholder="Number of Rooms"
          min="1"
          max="9">

        <label for="bathrooms">Bathrooms:</label>
        <input
          type="number"
          id="bathrooms"
          name="property[bathrooms]"
          value="<?php echo s($property->bathrooms); ?>"
          placeholder="Number of Bathrooms"
          min="1"
          max="9">

        <label for="parking">Parking:</label>
        <input
          type="number"
          id="parking"
          name="property[parking]"
          value="<?php echo s($property->parking); ?>"
          placeholder="Number of Parkings"
          min="1"
          max="9">
      </fieldset>

      <fieldset>
        <legend>Seller</legend>

        <label for="seller">Seller</label>
        <select name="property[seller_id]" id="seller">
          <option selected value="">-- Select seller --</option>
          <?php foreach($sellers as $seller) { ?>
            <option
              <?php echo $property->seller_id === $seller->id ? 'selected' : ''; ?>
              value="<?php echo s($seller->id) ?>"><?php echo s($seller->name) . "" . s($seller->lastname); ?>
            </option>
          <?php } ?>
        </select>
      </fieldset>
