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
    $fields   = [
      $acf->add('boolean', [
        'label' => 'All Pages',
        'slug' => 'all_pages',
        'ui' => 1
      ]),
      $acf->add('post_object', [
        'label' => 'Select Pages',
        'slug' => 'pages',
        'post_type' => [
          'post',
          'page'
        ],
        'multiple' => 1,
        'conditional_logic' => [
          [
            [
              'field' => 'all_pages',
              'operator' => '==',
              'value' => '0'
            ],
          ]
        ]
      ])
    ];
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
