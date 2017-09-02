<?php
/**
 * This file is a part of AMCms core
 */
use Symfony\Component\VarDumper\VarDumper;

if (! function_exists('app')) {
    /**
     * Get the available container instance or container item.
     *
     * @param  string  $containerItem
     * @param  array   $parameters
     * @return mixed|DI
     */
    function app($containerItem=null)
    {
        /**
         * @todo  Remove global!!!
         * We need change method of recieving $app instance. 
         * Singleton? 
         * Including helpers in bootstrap?
         */
        global $app;

        $container = $app->getContainer();

        if (is_null($containerItem)) {
            return $container;
        }

        return $container->$containerItem;
    }
}

if (! function_exists('config')) {
    /**
     * Get the available container setting item.
     *
     * @param  string  $settingItem
     * @param  array   $parameters
     * @return string
     */
    function config($settingItem=null)
    {
        if (is_null($settingItem)) {
            return app('settings');
        }

        return app('settings')[$settingItem];
    }
}

if (! function_exists('app_path')) {
    /**
     * Get the path to the application folder.
     *
     * @param  string  $path
     * @return string
     */
    function app_path($path = '')
    {
        return app('path').($path ? DIRECTORY_SEPARATOR.$path : $path);
    }
}

if (! function_exists('resource_path')) {
    /**
     * Get the path to the resources folder.
     *
     * @param  string  $path
     * @return string
     */
    function resource_path($path = '')
    {
        return app_path('resources') . ($path ? DIRECTORY_SEPARATOR.$path : $path);
    }
}

if (! function_exists('database_path')) {
    /**
     * Get the path to the resources folder.
     *
     * @param  string  $path
     * @return string
     */
    function database_path($path = '')
    {
        return app_path('database') . ($path ? DIRECTORY_SEPARATOR.$path : $path);
    }
}

// if (! function_exists('view')) {
    /**
     * Get the parser.
     *
     * @param  string  $path
     * @return string
     */
//     function view($type='quad')
//     {
//         return app($type);
//     }
// }
// 

if (! function_exists('dd')) {
    /**
     * Dump the passed variables and end the script.
     *
     * @param  mixed
     * @return void
     */
    function dd()
    {
        foreach (func_get_args() as $var) {
            VarDumper::dump($var);
        }

        die(1);
    }
}

