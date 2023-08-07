<?php

if (!function_exists('is_active_route')) {
    function is_active_route($routeNames, $defaultClass = '')
    {
        if (!is_array($routeNames)) {
            $routeNames = [$routeNames];
        }

        foreach ($routeNames as $routeName) {
            if (request()->routeIs($routeName)) {
                return 'active';
            }
        }

        return $defaultClass;
    }
}
