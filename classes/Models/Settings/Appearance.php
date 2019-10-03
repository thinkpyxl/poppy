<?php

namespace Poppy\Models\Settings;

use Poppy\Utils\Fields;
use Poppy\Models\PostTypes;

class Appearance extends RegisterSettings
{
  const SLUG  = 'appearance';
  const LABEL = 'Appearance';

  public static function init()
  {
    $acf      = new Fields();
    $fields   = [
      $acf->add('button_group', [
        'label' => 'Alignment',
        'slug' => 'alignment',
        'choices' => [
          'left' => 'Left',
          'center' => 'Center',
          'right' => 'Right',
        ]
      ]),
      $acf->add('button_group', [
        'label' => 'Position',
        'slug' => 'position',
        'choices' => [
          'top' => 'Top',
          'center' => 'Center',
          'bottom' => 'Bottom',
        ]
      ]),
      $acf->add('button_group', [
        'label' => 'Size',
        'slug' => 'size',
        'choices' => [
          'full' => 'Full',
          'wide' => 'Wide',
          'narrow' => 'Narrow',
        ]
      ]),
      $acf->add('boolean', [
        'label' => 'Docked',
        'slug' => 'docked',
        'ui' => 1,
      ]),
      $acf->add('boolean', [
        'label' => 'Peek',
        'slug' => 'peek',
        'ui' => 1,
      ]),
      $acf->add('textarea', [
        'label' => 'Peek Message',
        'slug' => 'peek_message',
        'conditional_logic' => [
          [
            [
              'field' => 'peek',
              'operator' => '==',
              'value' => '1'
            ]
          ]
        ]
      ]),
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
