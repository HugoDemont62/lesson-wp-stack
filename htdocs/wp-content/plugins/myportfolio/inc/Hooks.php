<?php
/**
 * This file is part of the AmphiBee package.
 * (c) AmphiBee <contact@amhibee.fr>
 */


namespace Portfolio;

class Hooks
{
    public function register(): void
    {
        add_filter( 'comments_open', '__return_false', 10 , 2 );
    }
    
}

