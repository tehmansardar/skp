<?php
/**
 * @package skontechplugin
 */
namespace Inc;

final class Init
{
    /**
     * store all classes inside an array
     * @return array full list of classes
     */

    public static function get_services()
    {
        return [
            Pages\Admin::class,
            Base\Enqueue::class,
        ];
    }

    /**
     * Loop through classes,  Initialize them
     * and call the register() method if it exists
     *  @return
     * */

    public static function register_services()
    {
        foreach (self::get_services() as $class) {
            $service = self::instantiate($class);

            if (method_exists($service, 'register')) {
                $service->register();
            }
        }
    }

    /**
     * Initialize the class
     * prams class $class, class from the service array
     * @return class instantiate: new instance of the class
     **/

    private static function instantiate($class)
    {
        $service = new $class();
        return $service;
    }
}
