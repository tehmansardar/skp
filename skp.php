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

// OOP practices
class skp{
    function __construct($string){
        echo $string;
    }
}

if(class_exists('skp')){
    $skp = new skp('Plugin is activated');
}