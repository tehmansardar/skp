<?php
/**
 * @package skontechplugin
 */

namespace Inc\Base;

class Enqueue
{
    public $ver;

    public function register()
    {
        add_action('admin_enqueue_scripts', [$this, 'enqueue']);
    }

    public function enqueue()
    {
        $this->ver = SKP_DEV ? time() : false;
        wp_enqueue_style('mypluginstyle', PLUGIN_URL . 'assets/mystyle.css', [], $this->ver, 'all');
        wp_enqueue_script('mypluginscript', PLUGIN_URL . 'assets/myscript.js', [], $this->ver, true);
    }
}
