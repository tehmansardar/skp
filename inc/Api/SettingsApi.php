<?php

/**
 * @package skontechplugin
 */

namespace Inc\Api;

class SettingsApi
{
    public $admin_pages = [];

    public $admin_subPages = [];

    // Settings Api
    public $settings = [];

    public $sections = [];

    public $fields = [];

    public function register()
    {
        if (!empty($this->admin_pages)) {

            add_action('admin_menu', [$this, 'addAdminMenu']);
        }

        if (!empty($this->settings)) {
            add_action('admin_init', [$this, 'registerCustomFields']);
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


    // Settings API
    public function setSettings(array $settings)
    {
        $this->settings = $settings;
        return $this;
    }

    public function setSections(array $sections)
    {
        $this->sections = $sections;
        return $this;
    }

    public function setFields(array $fields)
    {
        $this->fields = $fields;
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

    public function registerCustomFields()
    {
        // register settings
        foreach ($this->settings as $setting) {
            register_setting(
                $setting['option_group'],
                $setting['option_name'],
                (isset($setting['callback']) ? $setting['callback'] : '')
            );
        }

        // add sections
        foreach ($this->sections as $section) {
            add_settings_section(
                $section['id'],
                $section['title'],
                (isset($section['callback']) ? $section['callback'] : ''),
                $section['page']
            );
        }

        foreach ($this->fields as $field) {
            add_settings_field(
                $field['id'],
                $field['title'],
                (isset($field['callback']) ? $field['callback'] : ''),
                $field['page'],
                $field['section'],
                (isset($field['args']) ? $field['args'] : '')
            );
        }
    }
}
