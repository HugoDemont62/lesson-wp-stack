<?php
/**
 * This file is part of the AmphiBee package.
 * (c) AmphiBee <contact@amhibee.fr>
 */


namespace Portfolio;

class PostType
{
    public const SLUG = 'portfolio';

    public function register(): void
    {
        add_action('init', function () {
            $labels = array(
                // Le nom au pluriel
                'name'               => _x('Réalisations', 'Post Type General Name'),
                // Le nom au singulier
                'singular_name'      => _x('Réalisation', 'Post Type Singular Name'),
                // Le libellé affiché dans le menu
                'menu_name'          => __('Portfolio'),
                // Les différents libellés de l'administration
                'all_items'          => __('Toutes les réalisations'),
                'view_item'          => __('Voir la réalisation'),
                'add_new_item'       => __('Ajouter une nouvelle réalisation'),
                'add_new'            => __('Ajouter'),
                'edit_item'          => __('Editer la réalisation'),
                'update_item'        => __('Modifier la réalisation'),
                'search_items'       => __('Rechercher une réalisation'),
                'not_found'          => __('Non trouvée'),
                'not_found_in_trash' => __('Non trouvée dans la corbeille'),
            );

            // On peut définir ici d'autres options pour notre custom post type

            $args = array(
                'label'        => __('Réalisations'),
                'description'  => __('Mon portfolio'),
                'labels'       => $labels,
                // On définit les options disponibles dans l'éditeur de notre custom post type ( un titre, un auteur...)
                'supports'     => array(
                    'title',
                    'editor',
                    'excerpt',
                    'author',
                    'thumbnail',
                    'comments',
                    'revisions',
                    'custom-fields',
                ),
                /* 
                * Différentes options supplémentaires
                */
                'show_in_rest' => true,
                'hierarchical' => false,
                'public'       => true,
                'has_archive'  => true,
                'rewrite'      => array('slug' => self::SLUG),
                'show_in_nav_menus' => true
            );

            register_post_type(self::SLUG, $args);
        });
    }
}
