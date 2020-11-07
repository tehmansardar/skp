<?php

namespace Inc\Api\Callbacks;

use Inc\Base\BaseController;

class ManagerCallbacks extends BaseController
{
    public function checkboxSanitize($input)
    {
        return (isset($input) ? true : false);
    }

    public function adminSectionManger()
    {
        echo 'Manage the sections and Features of this plugin by activating the checkboxes from the following list.';
    }

    public function checkboxField($args)
    {
        $name       =   $args['label_for'];
        $classes    =   $args['class'];
        $checkbox   =   get_option($name);
        echo '<input type ="checkbox" name="' . $name . '" value="1" class="' . $classes . '" ' . ($checkbox ? 'checked' : '') . ' />';
    }
}
