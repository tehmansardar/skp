<?php

/**
 * @package skontechplugin
 */

namespace Inc\Pages;

use \Inc\Api\Callbacks\AdminCallbacks;
use \Inc\Api\Callbacks\ManagerCallbacks;
use \Inc\Api\SettingsApi;
use \Inc\Base\BaseController;

class Admin extends BaseController
{
    public $settings;
    public $callbacks;
    public $callbacks_mngr;
    public $pages = [];
    public $subPages = [];
    public function register()
    {
        $this->settings         = new SettingsApi();
        $this->callbacks        = new AdminCallbacks();
        $this->callbacks_mngr   = new ManagerCallbacks();
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
                'option_group'  =>  'skp_settings',
                'option_name'   =>  'cpt_manager',
                'callback'      =>  [$this->callbacks_mngr, 'checkboxSanitize']
            ],
            [
                'option_group'  =>  'skp_settings',
                'option_name'   =>  'taxonomy_manager',
                'callback'      =>  [$this->callbacks_mngr, 'checkboxSanitize']
            ],
            [
                'option_group'  =>  'skp_settings',
                'option_name'   =>  'media_manager',
                'callback'      =>  [$this->callbacks_mngr, 'checkboxSanitize']
            ],
            [
                'option_group'  =>  'skp_settings',
                'option_name'   =>  'gallery_manager',
                'callback'      =>  [$this->callbacks_mngr, 'checkboxSanitize']
            ],
            [
                'option_group'  =>  'skp_settings',
                'option_name'   =>  'testimonial_manager',
                'callback'      =>  [$this->callbacks_mngr, 'checkboxSanitize']
            ],
            [
                'option_group'  =>  'skp_settings',
                'option_name'   =>  'templates_manager',
                'callback'      =>  [$this->callbacks_mngr, 'checkboxSanitize']
            ],
            [
                'option_group'  =>  'skp_settings',
                'option_name'   =>  'login_manager',
                'callback'      =>  [$this->callbacks_mngr, 'checkboxSanitize']
            ],
            [
                'option_group'  =>  'skp_settings',
                'option_name'   =>  'membership_manager',
                'callback'      =>  [$this->callbacks_mngr, 'checkboxSanitize']
            ],
            [
                'option_group'  =>  'skp_settings',
                'option_name'   =>  'chat_manager',
                'callback'      =>  [$this->callbacks_mngr, 'checkboxSanitize']
            ],

        ];

        $this->settings->setSettings($args);
    }

    public function setSections()
    {
        $args = [
            [
                'id'            =>      'skp_admin_index',
                'title'         =>      'Settings Manager',
                'callback'      =>      [$this->callbacks_mngr, 'adminSectionManger'],
                'page'          =>      'skp'
            ]
        ];

        $this->settings->setSections($args);
    }

    public function setFields()
    {
        $args = [
            [
                'id'        =>      'cpt_manager',
                'title'     =>      'Activate CPT Manager',
                'callback'  =>      [$this->callbacks_mngr, 'checkboxField'],
                'page'      =>      'skp',
                'section'   =>      'skp_admin_index',
                'args'      =>      [
                    'label_for'     =>  'cpt_manager',
                    'class'         =>  'ui-toggle'
                ]
            ],
            [
                'id'        =>      'taxonomy_manager',
                'title'     =>      'Activate Taxonomy Manager',
                'callback'  =>      [$this->callbacks_mngr, 'checkboxField'],
                'page'      =>      'skp',
                'section'   =>      'skp_admin_index',
                'args'      =>      [
                    'label_for'     =>  'taxonomy_manager',
                    'class'         =>  'ui-toggle'
                ]
            ],
            [
                'id'        =>      'gallery_manager',
                'title'     =>      'Activate Gallery Manager',
                'callback'  =>      [$this->callbacks_mngr, 'checkboxField'],
                'page'      =>      'skp',
                'section'   =>      'skp_admin_index',
                'args'      =>      [
                    'label_for'     =>  'gallery_manager',
                    'class'         =>  'ui-toggle'
                ]
            ],
            [
                'id'        =>      'testimonial_manager',
                'title'     =>      'Activate Testimonial Manager',
                'callback'  =>      [$this->callbacks_mngr, 'checkboxField'],
                'page'      =>      'skp',
                'section'   =>      'skp_admin_index',
                'args'      =>      [
                    'label_for'     =>  'testimonial_manager',
                    'class'         =>  'ui-toggle'
                ]
            ],
            [
                'id'        =>      'templates_manager',
                'title'     =>      'Activate Templates Manager',
                'callback'  =>      [$this->callbacks_mngr, 'checkboxField'],
                'page'      =>      'skp',
                'section'   =>      'skp_admin_index',
                'args'      =>      [
                    'label_for'     =>  'templates_manager',
                    'class'         =>  'ui-toggle'
                ]
            ],
            [
                'id'        =>      'login_manager',
                'title'     =>      'Activate Login Manager',
                'callback'  =>      [$this->callbacks_mngr, 'checkboxField'],
                'page'      =>      'skp',
                'section'   =>      'skp_admin_index',
                'args'      =>      [
                    'label_for'     =>  'login_manager',
                    'class'         =>  'ui-toggle'
                ]
            ],
            [
                'id'        =>      'membership_manager',
                'title'     =>      'Activate Membership Manager',
                'callback'  =>      [$this->callbacks_mngr, 'checkboxField'],
                'page'      =>      'skp',
                'section'   =>      'skp_admin_index',
                'args'      =>      [
                    'label_for'     =>  'membership_manager',
                    'class'         =>  'ui-toggle'
                ]
            ],
            [
                'id'        =>      'chat_manager',
                'title'     =>      'Activate Chat Manager',
                'callback'  =>      [$this->callbacks_mngr, 'checkboxField'],
                'page'      =>      'skp',
                'section'   =>      'skp_admin_index',
                'args'      =>      [
                    'label_for'     =>  'chat_manager',
                    'class'         =>  'ui-toggle'
                ]
            ],
        ];

        $this->settings->setFields($args);
    }
}
