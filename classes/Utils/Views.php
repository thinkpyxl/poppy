<?php

namespace Poppy\Utils;

class Views
{
    public static function get_view($_path, $context)
    {
      $path = strpos($_path, '.php') !== false ? $_path : $_path . '.php';
      ob_start();
        include(\Poppy\PATH . "classes/Views/" . $path);

      return ob_get_clean();
    }
}
