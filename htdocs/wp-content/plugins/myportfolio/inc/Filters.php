<?php
/**
 * This file is part of the AmphiBee package.
 * (c) AmphiBee <contact@amhibee.fr>
 */


namespace Portfolio;

class Filters
{
    public function register()
    {
        add_action('pre_get_posts', function ($query) {
            if ( is_admin() || !$query->is_main_query() || empty($_POST)) {
                return $query;
            }            
            
            if ( is_post_type_archive ( PostType::SLUG ) ) {
                foreach ($_POST as $name => $value) {
                    if (str_contains($name, 'filter') && !empty($value)) {
                        if ($value === 'none') {
                            continue;
                        }
                        $key = str_replace('filter-', '', $name);
                        $query->set( 'meta_key',   $key );
                        $query->set( 'meta_value', $value );
                    }
                }
                
            }

            return $query;
        });
    }
    
    public static function display(): void
    {
        include apply_filters('filters_template', __DIR__ . '/../public/templates/filters.php');
    }
}
