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
    }
    public function register()
    {
        $this->settings->addPages($this->pages)->register();
    }
}
