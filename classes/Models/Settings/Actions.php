<?php

namespace Poppy\Models\Settings;

use Poppy\Utils\Fields;
use Poppy\Models\PostTypes;

class Actions extends RegisterSettings
{
  const SLUG  = 'actions';
  const LABEL = 'Actions';

  public static function init()
  {
    $acf      = new Fields();
    $fields   = [
      $acf->add('boolean', [
        'label' => 'More',
        'slug' => 'more',
        'instructions' => 'Display a link to another page with more information',
      ]),
      $acf->add('link', [
        'label' => 'More Link',
        'slug' => 'more_link',
        'conditional_logic' => [
          [
            [
              'field' => 'more',
              'operator' => '==',
              'value' => '1'
            ]
          ]
        ]
      ]),
      $acf->add('boolean', [
        'label' => 'Decline',
        'slug' => 'decline',
        'instructions' => 'Allow user to decline your popup',
      ]),
      $acf->add('text', [
        'label' => 'Decline Label',
        'slug' => 'decline_label',
        'placeholder' => 'Decline',
        'conditional_logic' => [
          [
            [
              'field' => 'decline',
              'operator' => '==',
              'value' => '1'
            ]
          ]
        ]
      ]),
      $acf->add('boolean', [
        'label' => 'Accept',
        'slug' => 'accept',
        'instructions' => 'Allow user to accept your popup',
      ]),
      $acf->add('text', [
        'label' => 'Accept Label',
        'slug' => 'accept_label',
        'placeholder' => 'Accept',
        'conditional_logic' => [
          [
            [
              'field' => 'accept',
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
