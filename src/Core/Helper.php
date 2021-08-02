<?php

/*
 * (>_) Resul Takak <resultakak@gmail.com>
 */
declare(strict_types=1);

namespace Api\Core;

use function function_exists;
use function realpath;

if (! function_exists('load_path')) {
    /**
     * @param string $path_var
     * @return mixed
     */
    function load_path(string $path_var)
    {
        return include realpath($path_var);
    }
}

if (! function_exists('get_id')) {
    /**
     * @return int|null
     */
    function get_id()
    {
        $request = $_SERVER['REQUEST_URI'] ?? false;
        if ($request) {
            $array = explode("/", $request);
            $id = intval(end($array));
            return isset($id) && ! empty($id) && $id >= 0 ? $id : null;
        }

        return null;
    }
}


if (! function_exists('url_mach_helper')) {
    function url_mach_helper($uri)
    {
        if (! is_string($uri)) {
            return $uri;
        }

        return str_replace([":id"], [get_id()], $uri);
    }
}
