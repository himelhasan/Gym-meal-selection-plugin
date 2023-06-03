<?php
/*
Plugin Name: Meal Selection Gym Form
Plugin URI: https://coderscrown.com/
Description: A plugin for creating a multi-step Meal Selection Gym Form
Version: 1.0.0
Author: Himel Hasan
Author URI: https://HimelHasan.com/
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

// Enqueue plugin scripts and styles
function multistep_form_plugin_enqueue() {
  wp_enqueue_style('multistep-form-plugin-style', plugins_url('css/style.css', __FILE__));
  wp_enqueue_script('multistep-form-plugin-script', plugins_url('js/script.js', __FILE__), array('jquery'), '1.0.0', true);

  wp_localize_script('multistep-form-plugin-script', 'multistepFormAjax', array(
    'ajaxurl' => admin_url('admin-ajax.php'),
  ));
}
add_action('wp_enqueue_scripts', 'multistep_form_plugin_enqueue');

// Register AJAX handler for loading post options
if (!function_exists('multistep_form_plugin_load_post_options')) {
  function multistep_form_plugin_load_post_options() {
    if (isset($_POST['post_type'])) {
      $post_type = $_POST['post_type'];
      $posts = get_posts(array(
        'post_type' => $post_type,
        'posts_per_page' => -1,
        'orderby' => 'title',
        'order' => 'ASC',
      ));

      ob_start();
      foreach ($posts as $post) {
        echo '<input type="checkbox" id="' . esc_attr($post_type . '-' . $post->ID) . '" name="' . esc_attr($post_type) . '[]" value="' . esc_attr($post->ID) . '">';
        echo '<label for="' . esc_attr($post_type . '-' . $post->ID) . '" data-title="' . esc_attr(get_the_title($post->ID)) . '">' . esc_html(get_the_title($post->ID)) . '</label>';
      }
      $output = ob_get_clean();
      echo $output;
    }
    wp_die();
  }
}
add_action('wp_ajax_load_post_options', 'multistep_form_plugin_load_post_options');
add_action('wp_ajax_nopriv_load_post_options', 'multistep_form_plugin_load_post_options');

// Handle form submission
function multistep_form_handle_submission() {
  if (isset($_POST['multistep_form_submit'])) {
    // Process the form data
    $breakfast = isset($_POST['breakfast']) ? $_POST['breakfast'] : array();
    $lunch = isset($_POST['lunch']) ? $_POST['lunch'] : array();
    $dinner = isset($_POST['dinner']) ? $_POST['dinner'] : array();

    // Display the form results
    echo '<h2>Form Resultszzz</h2>';
    echo '<p><strong>Breakfast:</strong> ' . implode(', ', $breakfast) . '</p>';
    echo '<p><strong>Lunch:</strong> ' . implode(', ', $lunch) . '</p>';
    echo '<p><strong>Dinner:</strong> ' . implode(', ', $dinner) . '</p>';
  }
}
add_action('wp_ajax_handle_multistep_form', 'multistep_form_handle_submission');
add_action('wp_ajax_nopriv_handle_multistep_form', 'multistep_form_handle_submission');

// Shortcode for displaying the multistep form
function multistep_form_shortcode() {
  ob_start();
  include plugin_dir_path(__FILE__) . 'templates/multistep-form-template.php';
  return ob_get_clean();
}
add_shortcode('multistep_form', 'multistep_form_shortcode');
