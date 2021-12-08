<?php
/**
 * @package Visual Editor Dark Theme
 * Plugin Name: Visual Editor Dark Theme
 * Plugin URI: https://metainteractive.com
 * Description: Enable dark mode on visual editor
 * Version: 1.0.0
 * Author: Meta Interactive
 * Author URI: https://metainteractetive.com
 * License: GPLv2 or later
 * Text Domain: vdmt
 */

function vedt_init() {
  // NOTE: user id to enable for
  $user_id = 2;

  if(get_current_user_id() !== 2) return;

  /* Add Editor Style */
  add_filter( 'mce_css', 'my_plugin_editor_style' );

  function my_plugin_editor_style( $mce_css ){
    $mce_css .= ', ' . plugins_url( 'vedt-visual-tab.css', __FILE__ );
    return $mce_css;
  }

  function vedt_admin_style() {
    wp_enqueue_style('vedt-text-tab', plugin_dir_url( __FILE__ ) . 'vedt-text-tab.css');
  }

  add_action('admin_enqueue_scripts', 'vedt_admin_style');

}

add_action('init', 'vedt_init');