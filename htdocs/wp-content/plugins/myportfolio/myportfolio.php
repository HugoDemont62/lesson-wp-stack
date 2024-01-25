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

class Portfolio
{
    public function init()
    {
        (new \Portfolio\PostType())->register();       
    }
}

(new Portfolio())->init();
