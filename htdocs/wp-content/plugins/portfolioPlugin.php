<?php
/*
Plugin Name: Portfolio Plugin
Description: This is a simple portfolio plugin
Version: 1.0
Author: Hugo Demont
*/

add_action('init', 'create_portfolio');
function create_portfolio(): void
{
    register_post_type(
        'portfolio',
        [
            'labels' => [
                'name' => 'Portfolio',
                'singular_name' => 'Portfolio',
                'add_new' => 'Add New',
                'add_new_item' => 'Add New Portfolio Item',
                'edit' => 'Edit',
                'edit_item' => 'Edit Portfolio Item',
                'new_item' => 'New Portfolio Item',
                'view' => 'View',
                'view_item' => 'View Portfolio Item',
                'search_items' => 'Search Portfolio',
                'not_found' => 'No Portfolio items found',
                'not_found_in_trash' => 'No Portfolio items found in Trash',
                'parent' => 'Parent Portfolio Item',
            ],
            'public' => true,
            'menu_position' => 15,
            'supports' => ['title', 'editor', 'comments', 'thumbnail'],
            'taxonomies' => [''],
            'menu_icon' => plugins_url('images/image.png', __FILE__),
            'has_archive' => true,
        ]
    );
}

function display_portfolio(String $content): string
{
    if (is_singular('portfolio')) {
        $content = '';
        $args = ['post_type' => 'portfolio', 'posts_per_page' => 10];
        $loop = new WP_Query($args);
        while ($loop->have_posts()) : $loop->the_post();
            $content .= '<div class="portfolio-post">';
            $content .= '<h2 class="portfolio-title">' . get_the_title() . '</h2>';
            $content .= '<div class="portfolio-excerpt">' . get_the_excerpt() . '</div>';
            $content .= '<div class="portfolio-thumbnail">' . get_the_post_thumbnail() . '</div>';
            $content .= '</div>';
        endwhile;
    }

    return $content;
}

function filter_comments_status($open, $post_id) {
    $post = get_post($post_id);
    if($post->post_type == 'portfolio'){
        return false;
    }

    return $open;
}
add_filter('comments_open', 'filter_comments_status', 10, 2);