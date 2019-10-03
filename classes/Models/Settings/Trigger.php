<?php

namespace Poppy\Models\Settings;

use Poppy\Utils\Fields;
use Poppy\Models\PostTypes;

class Trigger extends RegisterSettings
{
    const SLUG  = 'trigger';
    const LABEL = 'Trigger';

    public static function init()
    {
        $acf      = new Fields();
        $fields   = [
            $acf->add('button_group', [
                'label' => 'Trigger Type',
                'slug' => 'trigger_type',
                'choices' => [
                    'load' => 'Load',
                    'scroll' => 'Scroll'
                ]
            ]),
            $acf->add('group', [
                'label' => '',
                'slug' => 'trigger_scroll',
                'sub_fields' => [
                    $acf->add('button_group', [
                        'label' => 'Measurement',
                        'slug' => 'measurement',
                        'choices' => [
                            'percent' => 'Percentage',
                            'pixels' => 'Pixels',
                        ],
                    ]),
                    $acf->add('range', [
                        'label' => 'Page Height',
                        'slug' => 'value_percent',
                        'append' => '%',
                        'conditional_logic' => [
                            [
                                [
                                    'field' => 'measurement',
                                    'operator' => '==',
                                    'value' => 'percent'
                                ],
                            ]
                        ]
                    ]),
                    $acf->add('number', [
                        'label' => 'Scroll Distance',
                        'slug' => 'value_pixels',
                        'min' => 0,
                        'append' => 'px',
                        'conditional_logic' => [
                            [
                                [
                                    'field' => 'measurement',
                                    'operator' => '==',
                                    'value' => 'pixels'
                                ],
                            ]
                        ]
                    ])
                ],
                'conditional_logic' => [
                    [
                        [
                            'field' => 'trigger_type',
                            'operator' => '==',
                            'value' => 'scroll'
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
