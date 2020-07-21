<?php
/**
 * @package skontechplugin
 */
class SkpActivate{
    public static function activate(){
        // flush rewrite rules
        flush_rewrite_rules();
    }
}