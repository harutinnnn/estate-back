<?php


if (!function_exists('show_error')) {
    function show_error(string $name, $validation): string
    {
        if ($validation && $validation->hasError($name)) {
            return $validation->getError($name);
        }

        return "";
    }
}