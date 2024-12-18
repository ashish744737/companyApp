<?php

if (!function_exists('ensure_directory_exists')) {
    function ensure_directory_exists($path, $permissions = 0755)
    {
        if (!file_exists($path)) {
            mkdir($path, $permissions, true);
        }

        return $path;
    }
}
