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
        if (is_admin()) {
            return false;
        }

        $path = 'dist/styles/poppy.css';

        wp_enqueue_style(
            'poppy',
            \Poppy\URI . $path
        );
    }

    private function get_popup_data($popup)
    {
        $fields = get_fields($popup->ID);

        return [
            'title' => $popup->post_title,
            'slug' => $popup->post_name,

            // Appearance
            'alignment' => array_key_exists('alignment', $fields) ? $fields['alignment'] : 'center',
            'position' => array_key_exists('position', $fields) ? $fields['position'] : 'center',
            'size' => array_key_exists('size', $fields) ? $fields['size'] : 'narrow',
            'docked' => array_key_exists('alignment', $fields) ? $fields['docked'] : false,
            'peek'  => array_key_exists('peek', $fields) ? $fields['peek'] : true,
            'peek_message' => array_key_exists('peek_message', $fields) ? $fields['peek_message'] : '',

            // Actions
            'actions' => self::get_actions($fields),

            // Trigger
            'trigger' => self::get_trigger($fields),

            // Rewrite using slug
            'cookie' => [
                'name' => $popup->post_name,
                'expires' => '',
            ],

            // content
            'content' => apply_filters('the_content', $popup->post_content)
        ];
    }

    private function get_popups()
    {
        global $post;

        $popups_query_args = [
            'post_type' => 'poppy',
            'post_status' => 'publish',
            'meta_query' => [
                'relation' => 'OR',
                [
                    'key' => 'pages',
                    'value' => '"' . $post->ID . '"',
                    'compare' => 'LIKE'
                ],
                [
                    'key' => 'all_pages',
                    'value' => '1',
                ]
            ]
        ];
        $popups_query = new \WP_Query($popups_query_args);
        $popups = array_map(
            [self::$class, 'get_popup_data'],
            $popups_query->posts
        );

        return [
            'popups' => $popups,
        ];
    }

    private function get_actions($fields)
    {
        $actions = [
            [
                'label' => array_key_exists('more_link', $fields) && $fields['more_link'] !== '' ? $fields['more_link']['title'] : 'More',
                'action' => 'more',
                'url' => array_key_exists('url', $fields) && $fields['more_link'] !== '' ? $fields['more_link']['url'] : '#',
                'target' => array_key_exists('target', $fields) && $fields['more_link'] !== '' ? $fields['more_link']['target'] : '_blank',
            ],
            [
                'label' => array_key_exists('decline_label', $fields) && $fields['decline_label'] !== '' ? $fields['decline_label'] : 'Decline',
                'action' => 'decline'
            ],
            [
                'label' => array_key_exists('accept_label', $fields) && $fields['accept_label']!== '' ? $fields['accept_label'] : 'Accept',
                'action' => 'accept'
            ]
        ];

        return array_values(array_filter(
            $actions,
            function ($action) use ($fields) {
                return array_key_exists($action['action'], $fields) && $fields[$action['action']];
            }
        ));
    }

    private function get_trigger($fields) {
        $trigger = [
            'type' => array_key_exists('trigger_type', $fields) ? $fields['trigger_type'] : 'load',
        ];

        if (array_key_exists("trigger_scroll", $fields)) {
            $trigger = array_merge(
                $trigger,
                [
                    'measurement' => $fields['trigger_scroll']['measurement'],
                    'value' => $fields['trigger_scroll']['value_' . $fields['trigger_scroll']['measurement']],
                ]
            );
        }

        return $trigger;
    }
}
