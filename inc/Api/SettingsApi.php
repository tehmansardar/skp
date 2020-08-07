<?php
/**
 * @package skontechplugin
 */
namespace Inc\Api;

class SettingsApi
{
    public $admin_pages = [];

    public $admin_subPages = [];

    public function register()
    {
        if (!empty($this->admin_pages)) {

            add_action('admin_menu', [$this, 'addAdminMenu']);
        }
    }

    public function addPages(array $pages)
    {
        $this->admin_pages = $pages;
        return $this;
    }

    public function withSubPage(string $title = null)
    {
        if (empty($this->admin_pages)) {
            return $this;
        }

        $adminPage = $this->admin_pages[0];
        $subPage = [
            [
                'parent_slug' => $adminPage['menu-slug'],
                'page-title' => $adminPage['page-title'],
                'menu-title' => $title ?: $adminPage['menu-title'],
                'capability' => $adminPage['capability'],
                'menu-slug' => $adminPage['menu-slug'],
                'callback' => $adminPage['callback'],
            ],
        ];

        $this->admin_subPages = $subPage;
        return $this;
    }

    public function addSubPages(array $pages)
    {
        $this->admin_subPages = array_merge($this->admin_subPages, $pages);
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

        foreach ($this->admin_subPages as $page) {
            add_submenu_page(
                $page['parent_slug'],
                $page['page-title'],
                $page['menu-title'],
                $page['capability'],
                $page['menu-slug'],
                $page['callback']
            );
        }
    }

}
