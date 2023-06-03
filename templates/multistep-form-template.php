<?php
/**
 * Multistep Form Template
 */
?>

<div id="form-container">
  <form id="multistep-form">
    <fieldset class="step">
      
      <h2>Choose your breakfast meal:</h2>
      <div id="breakfast-options">
        <?php
        $breakfast_posts = get_posts(array(
          'post_type' => 'recipe',
          'posts_per_page' => -1,
          'tax_query' => array(
            array(
              'taxonomy' => 'category',
              'field' => 'slug',
              'terms' => 'breakfast',
            ),
          ),
        ));

        foreach ($breakfast_posts as $post) {
          setup_postdata($post);
          $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'thumbnail');
          ?>
          <div class=checkbox>
          <input type="radio"id="<?php echo esc_attr('breakfast-' . $post->ID); ?>" name="breakfast" value="<?php echo esc_attr($post->ID); ?>">
          <label for="<?php echo esc_attr('breakfast-' . $post->ID); ?>">
          <label for="<?php echo esc_attr($post_type . '-' . $post->ID); ?>"> 
          </label>
          <img class="checkBoxImage" src="<?php echo esc_url($featured_image[0]); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" width="50">
        <p class="checkBoxTitle">  <?php echo esc_html($post->post_title); ?></p>
          </label></div>
          <?php
        }
        wp_reset_postdata();
        ?>
      </div>
      <br>
      <button type="button" class="next-btn">Next</button>
    </fieldset>

    <!--  -->
    <fieldset class="step">
       <h2>Choose your Breakfast Snack:</h2>
       <div id="snacks1-options">
      <?php
      $snacks1_posts = get_posts(array(
      'post_type' => 'recipe',
      'posts_per_page' => -1,
      'tax_query' => array(
        array(
          'taxonomy' => 'category',
          'field' => 'slug',
          'terms' => 'breakfast-snack	',
        ),
      ),
      ));

     foreach ($snacks1_posts as $post) {
      setup_postdata($post);
      $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'thumbnail');
      ?>
   <div class=checkbox>    <input type="radio" id="<?php echo esc_attr('snacks1-' . $post->ID); ?>" 
      name="snacks1" value="<?php echo esc_attr($post->ID); ?>">
      <label for="<?php echo esc_attr('snacks1-' . $post->ID); ?>"> 
      <label for="<?php echo esc_attr($post_type . '-' . $post->ID); ?>"> 
          </label>
          <img class="checkBoxImage" src="<?php echo esc_url($featured_image[0]); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" width="50">
        <p class="checkBoxTitle">  <?php echo esc_html($post->post_title); ?></p>
          </label> </div>
<?php
     }
      wp_reset_postdata();
      ?>
     </div>
     <br>
      <button type="button" class="prev-btn">Previous</button>
      <button type="button" class="next-btn">Next</button>
    </fieldset>

    <!--  -->
    <fieldset class="step">
      <h2>Choose your lunch meal:</h2>
      <div id="lunch-options">
        <?php
        $lunch_posts = get_posts(array(
          'post_type' => 'recipe',
          'posts_per_page' => -1,
          'tax_query' => array(
            array(
              'taxonomy' => 'category',
              'field' => 'slug',
              'terms' => 'lunch',
            ),
          ),
        ));

        foreach ($lunch_posts as $post) {
          setup_postdata($post);
          $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'thumbnail');
          ?>
           <div class=checkbox>
          <input type="radio"id="<?php echo esc_attr('lunch-' . $post->ID); ?>" name="lunch" value="<?php echo esc_attr($post->ID); ?>">
          <label for="<?php echo esc_attr('lunch-' . $post->ID); ?>">
          <label for="<?php echo esc_attr($post_type . '-' . $post->ID); ?>"> 
          </label>
          <img class="checkBoxImage" src="<?php echo esc_url($featured_image[0]); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" width="50">
        <p class="checkBoxTitle">  <?php echo esc_html($post->post_title); ?></p>
          </label><div>
          <?php
        }
        wp_reset_postdata();
        ?>
      </div>
      <br>
      <button type="button" class="prev-btn">Previous</button>
      <button type="button" class="next-btn">Next</button>
    </fieldset>
    <!--  -->
    <fieldset class="step">
       <h2>Choose your Lunch Snack:</h2>
      <div id="snacks2-options">
     <?php
     $snacks2_posts = get_posts(array(
      'post_type' => 'recipe',
      'posts_per_page' => -1,
      'tax_query' => array(
        array(
          'taxonomy' => 'category',
          'field' => 'slug',
          'terms' => 'lunch-snack',
        ),
      ),
    ));

       foreach ($snacks2_posts as $post) {
      setup_postdata($post);
      $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'thumbnail');
      ?>
       <div class=checkbox>
      <input type="radio" id="<?php echo esc_attr('snacks2-' . $post->ID); ?>" name="snacks2" value="<?php echo esc_attr($post->ID); ?>">
      <label for="<?php echo esc_attr('snacks2-' . $post->ID); ?>">
      <label for="<?php echo esc_attr($post_type . '-' . $post->ID); ?>"> 
          </label>
          <img class="checkBoxImage" src="<?php echo esc_url($featured_image[0]); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" width="50">
        <p class="checkBoxTitle">  <?php echo esc_html($post->post_title); ?></p>
          </label> </div>
      <?php
      }
     wp_reset_postdata();
      ?>
    </div>
    <br>
      <button type="button" class="prev-btn">Previous</button>
    <button type="button" class="next-btn">Next</button>
  </fieldset>
    <!--  -->
    <fieldset class="step">
      <h2>Choose your dinner meal:</h2>
      <div id="dinner-options">
        <?php
        $dinner_posts = get_posts(array(
          'post_type' => 'recipe',
          'posts_per_page' => -1,
          'tax_query' => array(
            array(
              'taxonomy' => 'category',
              'field' => 'slug',
              'terms' => 'dinner',
            ),
          ),
        ));

        foreach ($dinner_posts as $post) {
          setup_postdata($post);
          $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'thumbnail');
          ?>
           <div class=checkbox>
          <input type="radio"id="<?php echo esc_attr('dinner-' . $post->ID); ?>" name="dinner" value="<?php echo esc_attr($post->ID); ?>">
          <label for="<?php echo esc_attr('dinner-' . $post->ID); ?>">
          <label for="<?php echo esc_attr($post_type . '-' . $post->ID); ?>"> 
          </label>
          <img class="checkBoxImage" src="<?php echo esc_url($featured_image[0]); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" width="50">
        <p class="checkBoxTitle">  <?php echo esc_html($post->post_title); ?></p>
          </label> <div>
          <?php
        }
        wp_reset_postdata();
        ?>
      </div>
      <br>
      <button type="button" class="prev-btn">Previous</button>
      <button type="button" class="next-btn">Next</button>
    </fieldset>
    <!--  -->
   



<fieldset class="step">
  <h2>Choose your Dinner Snack:</h2>
  <div id="snacks3-options">
    <?php
    $snacks3_posts = get_posts(array(
      'post_type' => 'recipe',
      'posts_per_page' => -1,
      'tax_query' => array(
        array(
          'taxonomy' => 'category',
          'field' => 'slug',
          'terms' => 'dinner-snack',
        ),
      ),
    ));

    foreach ($snacks3_posts as $post) {
      setup_postdata($post);
      $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'thumbnail');
      ?>
       <div class=checkbox>
      <input type="radio" id="<?php echo esc_attr('snacks3-' . $post->ID); ?>" name="snacks3" value="<?php echo esc_attr($post->ID); ?>">
      <label for="<?php echo esc_attr('snacks3-' . $post->ID); ?>">
      <label for="<?php echo esc_attr($post_type . '-' . $post->ID); ?>"> 
          </label>
          <img class="checkBoxImage" src="<?php echo esc_url($featured_image[0]); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" width="50">
        <p class="checkBoxTitle">  <?php echo esc_html($post->post_title); ?></p>
          </label> </div>
      <?php
    }
    wp_reset_postdata();
    ?>
  </div>
  <br>
  <button type="button" class="prev-btn">Previous</button>
  <button type="submit" class="submit-btn">Submit</button>
</fieldset>

    <!--  -->
  </form>

  <div id="form-results" class="hidden">
  <h2>Your Meal Selection</h2>
  <div class="mealResult">
  <div class="resultCard"><strong>Breakfast:</strong> <span id="breakfast-result"></span></div>
  <div class="resultCard"><strong>Breakfast Snack:</strong> <span id="snacks1-result"></span></div>
  <div class="resultCard"><strong>Lunch:</strong> <span id="lunch-result"></span></div>
  <div class="resultCard"><strong>Lunch Snack:</strong> <span id="snacks2-result"></span></div>
  <div class="resultCard"><strong>Dinner:</strong> <span id="dinner-result"></span></div>
  <div class="resultCard"><strong>Dinner Snack:</strong> <span id="snacks3-result"></span></div>
</div>
</div>

</div>
