<?php
/**
 * @package skontechplugin
 */

namespace Inc\Base;

class Activate
{
    public static function activate()
    {
        // flush rewrite rules
        flush_rewrite_rules();
    }
}
