<?php
/**
 * @package skontechplugin
 */

/*
Plugin Name: Skontech
Plugin URI: https//www.skontech.com/plugin
Description: Skontech is comprehensive plugin to get all access of wordpress functionalities in quick
Author: Tehman Sardar
 */

defined('ABSPATH') or die('Hey, what are you doing here? You silly human!');

if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
    require_once dirname(__FILE__) . '/vendor/autoload.php';
}

define('PLUGIN_PATH', plugin_dir_path(__FILE__));
define('PLUGIN_URL', plugin_dir_url(__FILE__));
define('SKP_DEV', true);

// Initialize the core class of plugin
if (class_exists('Inc\\Init')) {
    Inc\Init::register_services();
}
