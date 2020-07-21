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

defined('ABSPATH') or die('Hey you can\t access this, you silly human!');

class skp{
    function __construct(){
        add_action('init', [$this, 'custom_post_type']);
    }
    function register(){
        add_action('admin_enqueue_scripts', [$this, 'enqueue']);
    }


    function custom_post_type(){
        register_post_type('book', ['public'=>true, 'label'=> 'Book']);
    }

    function enqueue(){
        wp_enqueue_style('mypluginstyle', plugins_url('/assets/mystyle.css', __FILE__ ));
        wp_enqueue_script('mypluginscript', plugins_url('/assets/myscript.js', __FILE__ ));
    }
    function activate(){
        require_once plugin_dir_path(__FILE__) . 'inc/skp-activate.php';
        SkpActivate::activate();
    }
    function deactivate(){
        // flush rewrite rules
        flush_rewrite_rules();
    }
}

if(class_exists('skp')){
    $skp = new skp();
    $skp->register();
}

register_activation_hook(__FILE__, [$skp, 'activate']);

require_once plugin_dir_path(__FILE__) . 'inc/skp-deactivate.php';
register_deactivation_hook(__FILE__, ['SkpDeactivate', 'deactivate']);