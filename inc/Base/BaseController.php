<?php
/**
 * @package skontechplugin
 */
namespace Inc\Base;

class BaseController
{
    public $plugin;
    public $plugin_path;
    public $plugin_url;
    public $dev;
    public function __construct()
    {
        $this->plugin = plugin_basename(dirname(__FILE__, 3)) . '/skp.php';
        $this->plugin_path = plugin_dir_path(dirname(__FILE__, 2));
        $this->plugin_url = plugin_dir_url(dirname(__FILE__, 2));

        $this->dev = true;
    }
}
