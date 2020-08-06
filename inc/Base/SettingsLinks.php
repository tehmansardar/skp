<?php
/**
 * @package skontechplugin
 */
namespace Inc\Base;

class SettingsLinks
{
    protected $plugin;

    public function __construct()
    {
        $this->plugin = PLUGIN;
    }
    public function register()
    {
        add_filter("plugin_action_links_$this->plugin", [$this, 'settings_links']);
    }
    public function settings_links($links)
    {
        $settings_link = '<a href="admin.php?page=skp">Settings</a>';
        array_push($links, $settings_link);
        return $links;
    }
}
