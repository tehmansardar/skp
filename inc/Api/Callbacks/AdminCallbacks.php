<?php

/**
 * @package skontechplugin
 */

namespace Inc\Api\Callbacks;

use \Inc\Base\BaseController;

class AdminCallBacks extends BaseController
{

    public function skpOptionGroup($input)
    {
        return $input;
    }

    public function skpAdminIndex()
    {
        echo 'Check this beautiful section';
    }

    public function skpTextExample()
    {
        $value = esc_attr(get_option('text_example'));
        echo '<input type="text" class="regular-text" name="text_example" value = "' . $value . '" placeholder="Write Something" />';
    }
    public function skpFirstName()
    {
        $value = esc_attr(get_option('first_name'));
        echo '<input type="text" class="regular-text" name="first_name" value = "' . $value . '" placeholder="Write your frist name" />';
    }
    // ====================

    public function adminDashboard()
    {
        return require_once "$this->plugin_path/templates/admin.php";
    }

    public function adminCpt()
    {
        return require_once "$this->plugin_path/templates/cpt.php";
    }

    public function adminTaxonomy()
    {
        return require_once "$this->plugin_path/templates/taxonomy.php";
    }

    public function adminWidget()
    {
        return require_once "$this->plugin_path/templates/widget.php";
    }
}
