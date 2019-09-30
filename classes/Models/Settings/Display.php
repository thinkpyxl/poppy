<?php

namespace Poppy\Models\Settings;

use Poppy\Utils\Fields;
use Poppy\Models\PostTypes;

class Display extends RegisterSettings
{
  const SLUG  = 'display';
  const LABEL = 'Display';

  public static function init()
  {
    $acf      = new Fields();
    $fields   = [];
    $location = [
      [
        [
          'param'    => 'post_type',
          'operator' => '==',
          'value'    => PostTypes\Poppy::SLUG,
        ],
      ],
    ];
    parent::register([
      'slug'            => PostTypes\Poppy::SLUG . '__' . self::SLUG,
      'label_placement' => 'top',
      'name'            => __(self::LABEL, 'core'),
      'fields'          => $fields,
      'position'        => 'side',
      'location'        => $location,
    ]);
  }
}
