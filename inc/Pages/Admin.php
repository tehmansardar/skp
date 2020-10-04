<?php

/**
 * @package skontechplugin
 */

namespace Inc\Pages;

use \Inc\Api\Callbacks\AdminCallbacks;
use \Inc\Api\SettingsApi;
use \Inc\Base\BaseController;

class Admin extends BaseController
{
    public $settings;
    public $callbacks;
    public $pages = [];
    public $subPages = [];
    public function register()
    {
        $this->settings = new SettingsApi();
        $this->callbacks = new AdminCallbacks();
        $this->setPages();
        $this->setSubPages();

        $this->setSettings();
        $this->setSections();
        $this->setFields();

        $this->settings->addPages($this->pages)->withSubPage('Dashboard')->addSubPages($this->subPages)->register();
    }

    public function setPages()
    {
        $this->pages = [
            [
                'page-title' => 'skontech plugin',
                'menu-title' => 'Skontech',
                'capability' => 'manage_options',
                'menu-slug' => 'skp',
                'callback' => [$this->callbacks, 'adminDashboard'],
                'icon-url' => 'dashicons-store',
                'position' => 110,
            ],
        ];
    }

    public function setSubPages()
    {
        $this->subPages = [
            [
                'parent_slug' => 'skp',
                'page-title' => 'CPT Manager',
                'menu-title' => 'CPT Manager',
                'capability' => 'manage_options',
                'menu-slug' => 'cpt_manager',
                'callback' => [$this->callbacks, 'adminCpt'],
            ],
            [
                'parent_slug' => 'skp',
                'page-title' => 'Custom Taxonomies',
                'menu-title' => 'Taxonomies',
                'capability' => 'manage_options',
                'menu-slug' => 'skontech_taxonomies',
                'callback' => [$this->callbacks, 'adminTaxonomy'],
            ],
            [
                'parent_slug' => 'skp',
                'page-title' => 'Custom Widgets',
                'menu-title' => 'Widgets',
                'capability' => 'manage_options',
                'menu-slug' => 'skontech_widgets',
                'callback' => [$this->callbacks, 'adminWidget'],
            ],
        ];
    }

    public function setSettings()
    {
        $args = [
            [
                'option_group'  =>  'skp_option_group',
                'option_name'   =>  'text_example',
                'callback'      =>  [$this->callbacks, 'skpOptionGroup']
            ],
            [
                'option_group'  =>  'skp_option_group',
                'option_name'   =>  'first_name'
            ]
        ];

        $this->settings->setSettings($args);
    }

    public function setSections()
    {
        $args = [
            [
                'id'            =>      'skp_admin_index',
                'title'         =>      'Settings',
                'callback'      =>      [$this->callbacks, 'skpAdminIndex'],
                'page'          =>      'skp'
            ]
        ];

        $this->settings->setSections($args);
    }

    public function setFields()
    {
        $args = [
            [
                'id'        =>      'text_example',
                'title'     =>      'Text Example',
                'callback'  =>      [$this->callbacks, 'skpTextExample'],
                'page'      =>      'skp',
                'section'   =>      'skp_admin_index',
                'args'      =>      [
                    'label_for'     =>  'text_example',
                    'class'         =>  'example_class'
                ]
            ],
            [
                'id'        =>      'first_name',
                'title'     =>      'First Name',
                'callback'  =>      [$this->callbacks, 'skpFirstName'],
                'page'      =>      'skp',
                'section'   =>      'skp_admin_index',
                'args'      =>      [
                    'label_for'     =>  'first_name',
                    'class'         =>  'first_name'
                ]
            ],
        ];

        $this->settings->setFields($args);
    }
}
