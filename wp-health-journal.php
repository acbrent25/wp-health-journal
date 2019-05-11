<?php 
/*
Plugin Name: WP Health Journal
Description: Wordpress Health Journal plugin allows you to track your body measurements and daily eating habits
Version: 1.0
Author: Adam Champagne
Auther URI: https://adamchampagne.com/
*/

 // Exit if Accessed Directly
 if(!defined('ABSPATH')){
     exit;
 }

 // Load Scripts
 require_once(plugin_dir_path(__FILE__) . '/includes/wp-health-journal-scripts.php');

 // Load Custom Post Types
 require_once(plugin_dir_path(__FILE__) . '/includes/wp-health-journal-cpt.php');



/** Start: Detect ACF Pro plugin. Include if not present. */
if ( !class_exists('acf') ) { // if ACF Pro plugin does not currently exist

    /** Start: Customize ACF path */
    add_filter('acf/settings/path', 'wphj_acf_settings_path');
    function wphj_acf_settings_path( $path ) {
        $path = plugin_dir_path( __FILE__ ) . 'acf/';
        return $path;
    }

   /** Start: Customize ACF dir */
   add_filter('acf/settings/dir', 'wphj_acf_settings_dir');
   function wphj_acf_settings_dir( $path ) {
     $dir = plugin_dir_url( __FILE__ ) . 'acf/';
     return $dir;
   }

   /** Start: Include ACF */
   include_once( plugin_dir_path( __FILE__ ) . 'acf/acf.php' );
   /** End: Include ACF */
  
   /** Start: Stop ACF upgrade notifications */
   add_filter( 'site_transient_update_plugins', 'wphj_stop_acf_update_notifications', 11 );
   function wphj_stop_acf_update_notifications( $value ) {
     unset( $value->response[ plugin_dir_path( __FILE__ ) . 'acf/acf.php' ] );
     return $value;
   }
   /** End: Stop ACF upgrade notifications */
 } 

// (Optional) Hide the ACF admin menu item.
add_filter('acf/settings/show_admin', 'my_acf_settings_show_admin');
function my_acf_settings_show_admin( $show_admin ) {
    return false;
}

// Load Custom Fields
require_once(plugin_dir_path(__FILE__) . '/includes/wp-health-journal-fields.php');



