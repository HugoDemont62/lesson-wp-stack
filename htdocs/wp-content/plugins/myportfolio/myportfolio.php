<?php
/**
 * @package WPMyPortfolio
 * @version 1.0.0
 */

/*
Plugin Name: WP My Portfolio
Plugin URI: http://amphibee.fr
Description: Create and manage your portfolio from your blog
Author: Loïc Hall
Version: 1.0.0
*/

require_once 'inc/PostType.php';
require_once 'inc/Hooks.php';
require_once 'inc/Metaboxes.php';
require_once 'inc/Taxonomies.php';
require_once 'inc/ACF.php';
require_once 'inc/Filters.php';

class Portfolio
{
    public function init(): void
    {
        (new \Portfolio\PostType())->register();
        (new \Portfolio\Filters())->register();
        (new \Portfolio\Hooks())->register();
        (new \Portfolio\Metaboxes())->register();
        (new \Portfolio\Taxonomies())->register();
        try {
            (new \Portfolio\ACF())->register();
        } catch (\Geniem\ACF\Exception $e) {
            error_log($e->getMessage());
        }
    }
}

(new Portfolio())->init();
