<?php

    // List Todos
    function wphj_list_measurements($atts, $content = null) {
        global $post;
        // Create attributes and defaults
        $atts = shortcode_atts(array(
            'title' => 'My Measurements',
            'count' => '10',
            'category' => 'all',
        ), $atts);

        // Check category attribute
        if($atts['category'] ==  'all'){
            $terms = '';
        } else { 
            $terms = array (
                array(
                    'taxonomy'  => 'category',
                    'field'     => 'slug',
                    'terms'     => $atts['category']
                )
            );
        }

        // Query Args (Shortcod Options)
        $args = array(
            'post_type'         => 'measurement',
            'post_status'       => 'publish',
            'order_by'          => 'title',
            'order'             => 'ASC',
            'posts_per_page'    => $atts['count'],
            'tax_query'         => $terms
        );

        // Fetch measurements
        $measurements = new WP_QUERY($args);

        // Check for Todos
        if($measurements->have_posts()){
            // Get category slug
            $category = str_replace('-', ' ', $atts['category']);
            $category = strtolower($category);

            // Init Output
            $output = '';

            // Build Output
            $output .= '<div class="measurement-list">';
            while($measurements->have_posts()){
                $measurements->the_post();
                // Get Field Values
                $weight = get_field('wphj_weight');
                $waist = get_field('wphj_waist_size');

                $output .= '<div class="measurment">';
                $output .= '<h4>' . get_the_title() . '</h4>';
                $output .= '<p>Weight: ' . $weight . '</p>';
                $output .= '<p>Waist: ' . $waist . '</p>';
                $output .= '</div>';
            }

            $output .= '</div>';

            // Reset Post Data
            wp_reset_postdata();

            return $output;

        } else {
            return '<p>No Measurements</p>';
        }

    }

    // Todos list Shortcode
    add_shortcode('measurements', 'wphj_list_measurements');