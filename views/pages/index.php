<main class="container section">
    <?php include 'about-icons.php' ?>
  </main>

  <section class="section container">
    <h2>Featured properties</h2>

    <?php
      $limit = 3;
      include 'properties.php'
    ?>

    <div class="see-all align-center">
      <a href="properties" class="btn-blue">See all</a>
    </div>
  </section>

  <section class="img_contact">
    <h2>Find the house of your dreams</h2>
    <p>Fill the contact form and an advisor will talk to you as soon as possible.</p>
    <a href="contact" class="btn-yw btn-contact">Contact</a>
  </section>

  <div class="container section inf-section">
    <section class="blog">
      <h3>Our blog</h3>

      <article class="blog-entry">
        <div class="image">
          <picture>
            <source srcset="build/img/blog1.webp" type="image/webp">
            <source srcset="build/img/blog1.jpg" type="image/jpeg">
            <img src="build/img/blog1.jpg" alt="Text entry blog">
          </picture>
        </div>

        <div class="entry-text">
          <a href="entry">
            <h4>Terrace on the roof of your house</h4>
            <p class="info-meta">Written on: <span>08/05/2023</span> by <span>Admin</span></p>
            <p>Tips to construct the best terrace on the roof of your house using the best materials and saving money.</p>
          </a>
        </div>
      </article>

      <article class="blog-entry">
        <div class="image">
          <picture>
            <source srcset="build/img/blog2.webp" type="image/webp">
            <source srcset="build/img/blog2.jpg" type="image/jpeg">
            <img src="build/img/blog2.jpg" alt="Text entry blog">
          </picture>
        </div>

        <div class="entry-text">
          <a href="entry">
            <h4>Guide for the decoration of your home</h4>
            <p class="info-meta">Written on: <span>08/05/2023</span> by <span>Admin</span></p>
            <p>Maximize the space of your home with this guide, learn to combine furnitures and colors to give life to your space.</p>
          </a>
        </div>
      </article>
    </section>

    <section class="testimonials">
      <h3>Testimonials</h3>

      <div class="testimonial">
        <blockquote>
          The staff of this company were really professionals, gave a good customer service and the house they offered me met my expectations.
        </blockquote>
        <p>- Angie</p>
      </div>
    </section>
  </div>
