<?php
// Create custom post type

function wphj_register_measurment(){
    // Setup Labels
    $singular_name = apply_filters('wphj_label_single', 'Measurment');
    $plural_name = apply_filters('wphj_label_plural', 'Measurments');

    $labels = array(
        'name'              => $plural_name,
        'singular_name'     => $singular_name,
        'add_new'           => 'Add New',
        'add_new_item'      => 'Add New ' . $singular_name,
        'edit'              => 'Edit',
        'edit_item'         => 'Edit ' . $singular_name,
        'new_item'          => 'New' . $singular_name,
        'view'              => 'View',
        'view_item'         => 'View' . $singular_name,
        'search_items'      => 'Search' . $plural_name,
        'not_found'         => 'No ' . $plural_name . ' Found',
        'not_found_in_trash'=> 'No ' . $plural_name . ' Found',
        'menu_name'         => $plural_name,
    );

    $args = apply_filters('wphj_measurment_args', array(
        'labels'            => $labels,
        'description'       => 'Measurment by category',
        'taxonomies'        => array('category'),
        'public'            => true,
        'show_in_muen'      => true,
        'menu_positions'    => 5,
        'menu_icon'         => 'dashicons-universal-access-alt',
        'show_in_nav_menus' => true,
        'query_var'         => true,
        'can_export'        => true,
        'rewrite'           => array('slug' => 'measurment'),
        'capability_type'   => 'post',
        'supports'          => array(
            'title'
        )
    ));

    // Register Post Type
    register_post_type('measurment', $args);
}

add_action('init', 'wphj_register_measurment');
