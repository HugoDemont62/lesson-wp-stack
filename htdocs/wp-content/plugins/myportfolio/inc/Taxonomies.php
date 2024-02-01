<?php
/**
 * This file is part of the AmphiBee package.
 * (c) AmphiBee <contact@amhibee.fr>
 */


namespace Portfolio;

class Taxonomies
{
    public function register()
    {
        add_action('init', [$this, 'categories']);
    }
    
    public function categories()
    {
        $labels = array(
            'name'              => 'Catégories de portfolio',
            'singular_name'     => 'Catégorie de portfolio',
            'search_items'      => 'Rechercher des catégories de portfolio',
            'all_items'         => 'Toutes les catégories de portfolio',
            'parent_item'       => 'Catégorie parente du portfolio',
            'parent_item_colon' => 'Catégorie parente du portfolio :',
            'edit_item'         => 'Modifier la catégorie de portfolio',
            'update_item'       => 'Mettre à jour la catégorie de portfolio',
            'add_new_item'      => 'Ajouter une nouvelle catégorie de portfolio',
            'new_item_name'     => 'Nom de la nouvelle catégorie de portfolio',
            'menu_name'         => 'Catégories de portfolio',
        );


        $args = array(
            'hierarchical'      => true,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array('slug' => 'portfolio-category'),
            'show_in_rest'      => true
        );

    register_taxonomy('portfolio_category', 'portfolio', $args);
    }
}
