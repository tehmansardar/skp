<?php
/**
 * @package skontechplugin
 */
namespace Inc\Api;

class SettingsApi
{
    public $admin_pages = [];

    public function register()
    {
        add_action('admin_menu', [$this, 'addAdminMenu']);
    }

    public function addPages(array $pages)
    {
        $this->admin_pages = $pages;
        return $this;
    }

    public function addAdminMenu()
    {
        foreach ($this->admin_pages as $page) {
            add_menu_page(
                $page['page-title'],
                $page['menu-title'],
                $page['capability'],
                $page['menu-slug'],
                $page['callback'],
                $page['icon-url'],
                $page['position']
            );
        }
    }

}
