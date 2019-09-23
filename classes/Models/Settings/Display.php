<?php

namespace Poppy\Models\Settings;

use Poppy\Utils\Views;

class Display
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
    		'poppy_display',
    		'Display',
    		[$class, 'render'],
    		'poppy',
    		'side',
    		'high'
    	);
    }

    public static function render() {
      global $post;
      $meta = get_post_meta($post->ID);

      echo Views::get_view('Settings/Display', $meta);
    }

    public static function save($post_id) {
      // var_dump($_POST['poppy']);
      // die;
    }
}
