<?php
/**
 * @package skontechplugin
 */

namespace Inc\Base;

use \Inc\Base\BaseController;

class Enqueue extends BaseController
{
    public function register()
    {
        add_action('admin_enqueue_scripts', [$this, 'enqueue']);
    }

    public function enqueue()
    {
        $this->dev = $this->dev ? time() : false;
        wp_enqueue_style('mypluginstyle', $this->plugin_url . 'assets/mystyle.css', [], $this->dev, 'all');
        wp_enqueue_script('mypluginscript', $this->plugin_url . 'assets/myscript.js', [], $this->dev, true);
    }
}
