<fieldset>
        <legend>General Information</legend>

        <label for="name">Name:</label>
        <input type="text" id="name" name="seller[name]" value="<?php echo s($seller->name); ?>" placeholder="Name">

        <label for="lastname">Last name:</label>
        <input type="text" id="lastname" name="seller[lastname]" value="<?php echo s($seller->lastname); ?>"  placeholder="Last name">

        <label for="phone">Phone number:</label>
        <input type="text" id="phone" name="seller[phone]" value="<?php echo s($seller->phone); ?>"  placeholder="Phone number">
      </fieldset>
