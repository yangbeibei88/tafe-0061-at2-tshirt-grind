<?php

/**
 * The template for contact page
 * 
 * 
 * @package Tshirt Grind
 */
get_header();
?>
<section class="page-header">
  <div class="page-banner-bg-image" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ), url(<?php echo get_the_post_thumbnail_url(get_the_ID(), 'tshirt_grind_page_banner'); ?>);">
    <div class="container page-banner-content">
      <div class="breadcrumb"><?php tshirt_grind_breadcrumb(); ?></div>
      <h1 class="page-banner-title"><?php the_title(); ?></h1>
    </div>
  </div>

</section>
<section id="contact-content" class="py-5">
  <div class="container">
    <div class="row gx-5">
      <div class="col-sm-12 col-md-8">
        <div class="contact-form-column shadow p-5">
          <h2>Keep in touch!</h2>
          <form id="contact-form" class="row g-3 needs-validation" novalidate>
            <div class="col-md-6 field-group">
              <label for="inputFirstName" class="form-label fs-5">First Name</label>
              <input type="text" name="inputFirstName" id="inputFirstName" class="form-control" required>
              <div class="invalid-feedback fs-5">Please fill out this field.</div>
            </div>
            <div class="col-md-6 field-group">
              <label for="inputLastName" class="form-label fs-5">Last Name</label>
              <input type="text" name="inputLastName" id="inputLastName" class="form-control" required>
              <div class="invalid-feedback fs-5">Please fill out this field.</div>
            </div>
            <div class="col-md-6 field-group">
              <label for="inputEmailAdd" class="form-label fs-5">Email</label>
              <input type="email" name="inputEmailAdd" id="inputEmailAdd" class="form-control" required>
              <div class="invalid-feedback fs-5">Please enter a valid email.</div>
            </div>
            <div class="col-md-6 field-group">
              <label for="inputPhone" class="form-label fs-5">Phone</label>
              <input type="tel" name="inputPhone" id="inputPhone" class="form-control" required>
              <div class="invalid-feedback fs-5">Please enter a valid phone number.</div>
            </div>
            <!-- <div class="col-12">
            <label for="inputAddress" class="form-label fs-5">Address</label>
            <input type="text" name="inputAddress" id="inputAddress" class="form-control" placeholder="e.g. 1234 Main St" required>
            <div class="invalid-feedback">Please enter a valid address.</div>
          </div>
          <div class="col-md-6">
            <label for="inputCity" class="form-label fs-5">City</label>
            <input type="text" name="inputCity" id="inputCity" class="form-control" required>
            <div class="invalid-feedback">Please provide a valid city.</div>
          </div>
          <div class="col-md-3">
            <label for="selectState" class="form-label fs-5">State</label>
            <select name="selectState" id="selectState" class="form-select" required>
              <option slelected value="">Select...</option>
              <option value="ACT">ACT</option>
              <option value="NSW">NSW</option>
              <option value="NT">NT</option>
              <option value="QLD">QLD</option>
              <option value="SA">SA</option>
              <option value="TAS">TAS</option>
              <option value="VIC">VIC</option>
              <option value="WA">WA</option>
            </select>
            <div class="invalid-feedback">Please select a state.</div>
          </div>
          <div class="col-md-3">
            <label for="inputZip" class="form-label">Post Code</label>
            <input type="text" name="inputZip" id="inputZip" class="form-control" required>
            <div class="invalid-feedback">Please provide a valid post code.</div>
          </div> -->
            <div class="col-12 field-group">
              <label for="inputMessage" class="form-label fs-5">Message</label>
              <textarea name="inputMessage" id="inputMessage" rows="10" class="form-control" required></textarea>
              <div class="invalid-feedback fs-5">Please enter your message.</div>
            </div>
            <div class="col-12">
              <button class="btn btn-primary" type="submit">Submit</button>
            </div>
          </form>

        </div>
      </div>
      <div class="col-sm-12 col-md-4">
        <div class="contact-info-column shadow p-5">
          <h2><?php echo get_post_meta(get_the_ID(), 'company_name', TRUE); ?></h2>
          <p><i class="fas fa-location-dot"></i> <?php echo get_post_meta(get_the_ID(), 'address', TRUE); ?></p>
          <p><i class="fas fa-phone"></i> <a href="tel:<?php echo get_post_meta(get_the_ID(), 'tel', TRUE); ?>"> <?php echo get_post_meta(get_the_ID(), 'tel', TRUE); ?></a></p>
        </div>
      </div>
    </div>
  </div>
</section>
<?php get_footer(); ?>