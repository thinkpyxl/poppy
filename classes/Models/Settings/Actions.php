<?php

namespace Poppy\Models\Settings;

use Poppy\Utils\Views;

class Actions
{
    public static function init()
    {
        $class = new self;
        add_action('add_meta_boxes', [$class, 'register'], 10);
        add_action('save_post', [$class, 'save']);
    }

    public static function register()
    {
      $class = new self;
      \add_meta_box(
    		'poppy_actions',
    		'Actions',
    		[$class, 'render'],
    		'poppy',
    		'side',
    		'high'
    	);
    }

    public static function render() {
      global $post;
      $meta = get_post_meta($post->ID);
      $fields = [
        'accept_display' => true,
        'decline_display' => true,
        'more_display' => false,
      ];

      echo Views::get_view('Settings/Actions', $fields);
    }

    public static function save($post_id) {
      // var_dump($_POST['poppy']);
      // die;
    }
}
