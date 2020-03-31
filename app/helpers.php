<?php
if (!function_exists('route_locale')) {
    function route_locale($name, $parameters = [], $absolute = true) {
        return route($name, array_merge(['locale' => app()->getLocale()], $parameters), $absolute);
    }
}
