<?php
/**
 * This file is a part of AMCms core
 */

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
