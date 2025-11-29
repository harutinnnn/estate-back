<?php


if (!function_exists('show_error')) {
    function show_error(string $name, $validation): string
    {
        if ($validation && $validation->hasError($name)) {
            return '<div class="error-msg">'. $validation->getError($name).'</div>';
        }

        return "";
    }
}