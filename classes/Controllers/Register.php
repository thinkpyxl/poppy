<?php

namespace Poppy\Controllers;


use Poppy\Utils\ACF;

class Register
{
    public static function handler()
    {
        if (! ACF::is_active()) {
          wp_die('Advanced Custom Fields must be installed to use this version of Poppy.');
        }
    }
}
