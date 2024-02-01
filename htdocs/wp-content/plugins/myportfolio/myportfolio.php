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

class Portfolio
{
    public function init()
    {
        (new \Portfolio\PostType())->register();
        (new \Portfolio\Hooks())->register();
        (new \Portfolio\Metaboxes())->register();
        (new \Portfolio\Taxonomies())->register();
    }
}

(new Portfolio())->init();
