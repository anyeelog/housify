<main class="container section">
  <h1>Contact</h1>

  <?php if($message) {   ?>

    <p class="alert success"><?php echo $message; ?></p>

   <?php } ?>


  <picture>
    <source srcset="build/img/destacada3.webp" type="img/webp">
    <source srcset="build/img/destacada3.jpg" type="img/jpeg">
    <img src="build/img/destacada3.jpg" alt="Contact image">
  </picture>

  <h2>Fill the contact form</h2>

  <form class="form" action="/contact" method="POST">
    <fieldset>
      <legend>Personal information</legend>

      <label for="name">Name</label>
      <input type="text" id="name" placeholder="Your name" name="contact[name]" required>

      <label for="message">Message</label>
      <textarea type="text" name="contact[message]" id="message" placeholder="Your message" required></textarea>
    </fieldset>

    <fieldset>
      <legend>Property information</legend>

      <label for="message">Selling or buying</label>
      <select id="options" name="contact[type]" required>
        <option value="" disabled selected>-- Select option --</option>
        <option value="buy">Buying</option>
        <option value="sell">Selling</option>
      </select>

      <label for="pricing">Price or budget</label>
      <input type="number" id="pricing" placeholder="Your price or budget" name="contact[price]" required>
    </fieldset>

    <fieldset>
      <legend>Contact</legend>

      <p>How would you like to be contacted?</p>

      <div class="form-contact">
        <label for="contact-phone">Phone</label>
        <input type="radio" value="phone" id="contact-phone" name="contact[contact]" required>

        <label for="contact-mail">Mail</label>
        <input type="radio" value="mail" id="contact-mail" name="contact[contact]" required>
      </div>

      <div id="contact"></div>

    </fieldset>

    <input type="submit" value="Submit" class="btn-blue">
  </form>
</main>
