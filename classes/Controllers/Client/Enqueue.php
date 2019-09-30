<?php

namespace Poppy\Controllers\Client;

class Enqueue
{
    private static $class = null;

    public static function init()
    {
        self::$class = new self;
        add_action('wp_enqueue_scripts', [self::$class, 'enqueue_scripts'], 10);
        add_action('wp_enqueue_scripts', [self::$class, 'enqueue_styles'], 10);
    }

    public static function enqueue_scripts()
    {
        $path = 'dist/scripts/poppy.js';

        wp_register_script(
            'poppy',
            \Poppy\URI . $path,
            null,
            false,
            true
        );

        wp_localize_script(
            'poppy',
            'poppy',
            self::get_popups()
        );

        wp_enqueue_script(
            'poppy'
        );
    }

    public static function enqueue_styles()
    {
        $path = 'dist/styles/poppy.css';

        wp_enqueue_style(
            'poppy',
            \Poppy\URI . $path
        );
    }

    private function get_popup_data($popup) {
        $meta = get_post_meta($popup->ID);
        var_dump(! $meta['peek']);

        return [
            'title' => $popup->post_title,
            'slug' => $popup->post_name,

            // Appearance
            'alignment' => array_key_exists('alignment', $meta) ? $meta['alignment'] : 'center',
            'position' => array_key_exists('position', $meta) ? $meta['position'] : 'center',
            'size' => array_key_exists('size', $meta) ? $meta['size'] : 'narrow',
            'docked' => array_key_exists('alignment', $meta) ? $meta['docked'] == '1' : false,
            'peek'  => array_key_exists('peek', $meta) ? $meta['peek'] == '1' : true,
            'peek_message' => array_key_exists('peek_message', $meta) ? $meta['peek_message'] : '',

            // Actions
            'actions' => [
                [
                    'label' => 'More',
                    'action' => 'more',
                    'url' => 'https://www.google.com',
                    'target' => '_blank',
                ],
                [
                    'label' => 'Decline',
                    'action' => 'decline'
                ],
                [
                    'label' => 'Accept',
                    'action' => 'accept'
                ]
            ],

            // Trigger
            'trigger' => [
                'type' => 'load',
            ],

            // Rewrite using slug
            'cookie' => [
                'name' => 'testing-cookie',
                'expires' => '',
            ],

            // content
            'content' => apply_filters('the_content', $popup->post_content)
        ];
    }

    private function get_popups() {
        $popups_query_args = [
            'post_type' => 'poppy',
            'post_status' => 'publish',
        ];
        $popups_query = new \WP_Query($popups_query_args);
        $_popups = array_map(
            [self::$class, 'get_popup_data'],
            $popups_query->posts
        );

        return [
            'popups' => $_popups,
        ];
    }
}
