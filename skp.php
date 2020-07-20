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


    function custom_post_type(){
        register_post_type('book', ['public'=>true, 'label'=> 'Book']);
    }

    function activate(){
        // Generate a CPT
        $this->custom_post_type();
        // flush rewrite rules
        flush_rewrite_rules();
    }
    function deactivate(){
        // flush rewrite rules
        flush_rewrite_rules();
    }
}

if(class_exists('skp')){
    $skp = new skp();
}

register_activation_hook(__FILE__, [$skp, 'activate']);
register_deactivation_hook(__FILE__, [$skp, 'deactivate']);