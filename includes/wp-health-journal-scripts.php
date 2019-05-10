<?php

// Add Scripts

function wphj_add_scripts(){
    wp_enqueue_style('wphj-main-style', plugins_url() . '/wp-health-journal/css/style.css');
    wp_enqueue_script('wphj-main-script', plugins_url() . '/wp-health-journal/js/main.js');
}

add_action('wp_enqueue_scripts', 'wphj_add_scripts');