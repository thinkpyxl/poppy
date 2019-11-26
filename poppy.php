<?php
/**
 * Plugin Name: Poppy
 * Description: A WordPress popup plugin
 * Version: 1.0.2
 * Author: Pyxl Inc.
 * Author URI: https://pyxl.com
 * License: GPLv3+
 */

namespace Poppy;

defined('WPINC') || die;

define(__NAMESPACE__ . '\PATH', plugin_dir_path(__FILE__));
define(__NAMESPACE__ . '\URI', plugin_dir_url(__FILE__));

register_activation_hook(__FILE__, ['Poppy\Controllers\Register', 'handler']);

require_once 'lib/autoload.php';

add_action('plugins_loaded', function () {
    // Post Types
    Models\PostTypes\Poppy::init();

    // Settings
    Models\Settings\Actions::init();
    Models\Settings\Appearance::init();
    Models\Settings\Display::init();
    Models\Settings\Trigger::init();

    // Controllers
    Controllers\Client\Enqueue::init();
});
