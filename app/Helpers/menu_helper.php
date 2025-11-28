<?php

if (!function_exists('is_current_menu_in_child')) {
    function is_current_menu_in_child($slug = '', $nodes = []): bool
    {
        if (!empty($nodes)) {
            foreach ($nodes as $node) {
                if ('/' . $slug == $node['link']) {
                    return true;
                }
            }
        }
        return false;
    }
}