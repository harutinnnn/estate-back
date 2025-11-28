<?php

if (!function_exists('translate')) {
    function translate($str = false)
    {

        $renderer = service('renderer');
        $data = $renderer->getData();

        if (isset($data['pageData']['labels'][$str])) {
            $line = $data['pageData']['labels'][$str];
        } else {
            $line = $str;
        }
        return $line;
    }
}

if (!function_exists('langFontFamily')) {
    function langFontFamily($lang = false): string
    {


        if($lang == 'hy'){
            return '"Noto Sans Armenian", sans-serif';
        }else if($lang == 'ru'){
            return '"Roboto", sans-serif';
        }else{
            return '"Roboto", sans-serif';
        }
    }
}