<?php
/**
 * @package skontechplugin
 */
class SkpDeactivate{
    public static function deactivate(){
        // flush rewrite rules
        flush_rewrite_rules();
    }
}