<?php

namespace Poppy\Models\PostTypes;

class Poppy extends RegisterPostType
{
    const SLUG = 'poppy';

    const REST_BASE = 'poppy';

    const SINGULAR = 'Popup';

    const PLURAL = 'Popups';

    public static function init()
    {
        parent::register(
            self::class,
            [
                'menu_icon' => 'dashicons-text-page',
                'supports'  => [
                    'title',
                    'editor',
                ],
                'rewrite' => [
                    'slug'       => self::SLUG,
                    'with_front' => true,
                ]
            ]
        );
    }
}
