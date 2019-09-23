<?php

namespace Poppy\Models\Settings;

use Poppy\Utils\Views;

class Appearance
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
    		'poppy_appearance',
    		'Appearance',
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
        'alignment' => array_key_exists('alignment', $meta) ? $meta['alignment'][0] : 'center',
        'position' => array_key_exists('position', $meta) ? $meta['position'][0] : 'center',
        'size' => array_key_exists('size', $meta) ? $meta['size'][0] : 'narrow',
        'docked' => array_key_exists('docked', $meta) ? $meta['docked'][0] : false,
        'peek' => array_key_exists('peek', $meta) ? $meta['peek'][0] : true,
        'peek_message' => array_key_exists('peek_message', $meta) ? $meta['peek_message'][0] : '',
      ];

      echo Views::get_view('Settings/Appearance', $fields);
    }

    public static function save($post_id) {
      error_log(print_r($_POST, true));

      if (array_key_exists('poppy', $_POST) and array_key_exists('appearance', $_POST['poppy'])) {
        $alignment = array_key_exists('alignment', $_POST['poppy']['appearance']) ? $_POST['poppy']['appearance']['alignment'] : 'center';
        $position = array_key_exists('position', $_POST['poppy']['appearance']) ? $_POST['poppy']['appearance']['position'] : 'center';
        $size = array_key_exists('size', $_POST['poppy']['appearance']) ? $_POST['poppy']['appearance']['size'] : 'narrow';
        $docked = array_key_exists('docked', $_POST['poppy']['appearance']) ? $_POST['poppy']['appearance']['docked'] : 'off';
        $peek = array_key_exists('peek', $_POST['poppy']['appearance']) ? $_POST['poppy']['appearance']['peek'] : 'off';
        $peek_message = array_key_exists('peek_message', $_POST['poppy']['appearance']) ? $_POST['poppy']['appearance']['peek_message'] : '';

        update_post_meta( $post_id, 'alignment', $alignment );
        update_post_meta( $post_id, 'position', $position );
        update_post_meta( $post_id, 'size', $size );
        update_post_meta( $post_id, 'docked', $docked );
        update_post_meta( $post_id, 'peek', $peek );
        update_post_meta( $post_id, 'peek_message', $peek_message );
      }
    }
}
