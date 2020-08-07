<?php
/**
 * @package skontechplugin
 */

namespace Inc\Pages;

use \Inc\Api\SettingsApi;
use \Inc\Base\BaseController;

class Admin extends BaseController
{
    public $settings;
    public $pages = [];
    public $subPages = [];

    public function __construct()
    {
        $this->settings = new SettingsApi();
        $this->pages = [
            [
                'page-title' => 'skontech plugin',
                'menu-title' => 'Skontech',
                'capability' => 'manage_options',
                'menu-slug' => 'skp',
                'callback' => function () {echo '<h1>Skontech Admin Area</h1>';},
                'icon-url' => 'dashicons-store',
                'position' => 110,
            ],
        ];

        $this->subPages = [
            [
                'parent_slug' => 'skp',
                'page-title' => 'CPT Manager',
                'menu-title' => 'CPT Manager',
                'capability' => 'manage_options',
                'menu-slug' => 'cpt_manager',
                'callback' => function () {echo '<h1>CPT Manager</h1>';},
            ],
        ];
    }
    public function register()
    {
        $this->settings->addPages($this->pages)->withSubPage('Dashboard')->addSubPages($this->subPages)->register();
    }
}
