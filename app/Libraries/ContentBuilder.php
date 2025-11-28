<?php


namespace App\Libraries;


class ContentBuilder
{

    const HEADER = 'header';
    const PARAGRAPH = 'paragraph';
    const LIST = 'list';
    const IMAGE = 'image';
    const YOUTUBE = 'youtube';

    public static function objectToHtml($blocks = [])
    {


        $html = "";

        foreach ($blocks as $block) {

            switch ($block->type) {

                case self::HEADER:
                    $html = self::header($block, $html);
                    break;

                case self::PARAGRAPH:
                    $html = self::paragraph($block, $html);
                    break;

                case self::LIST:
                    $html = self::list($block, $html);
                    break;

                case self::IMAGE:
                    $html = self::image($block, $html);
                    break;
                case self::YOUTUBE:
                    $html = self::youtube($block, $html);
                    break;

            }
        }

        return $html;
    }


    private static function header($headerObj, $html): string
    {


        if (isset($headerObj->data) && $headerObj->data->text) {
            $html .= '<h' . $headerObj->data->level . '>';
            $html .= $headerObj->data->text;
            $html .= '</h' . $headerObj->data->level . '>';
        }

        return $html;
    }

    private static function paragraph($headerObj, $html): string
    {


        if (isset($headerObj->data) && $headerObj->data->text) {
            $html .= '<p>';
            $html .= $headerObj->data->text;
            $html .= '</p>';
        }

        return $html;
    }

    private static function list($headerObj, $html): string
    {


        if (isset($headerObj->data->items)) {
            $letListType = 'ul';
            if (isset($headerObj->data->meta->counterType) && $headerObj->data->meta->counterType == 'numeric') {
                $letListType = 'ol';
            }

            $html .= '<' . $letListType . '>';

            foreach ($headerObj->data->items as $item) {


                $html .= '<li>';
                $html .= $item->content;
                $html .= '</li>';

            }

            $html .= '</' . $letListType . '>';
        }

        return $html;
    }

    private static function image($headerObj, $html): string
    {


        if (isset($headerObj->data->file->url)) {

            $html .= '<img src="' . $headerObj->data->file->url . '" class="content-image" />';
        }

        return $html;
    }

    private static function youtube($headerObj, $html): string
    {


        if (isset($headerObj->data->url)) {


            $youUrl  = explode('=',$headerObj->data->url);

            $html .= '<iframe src="https://www.youtube.com/embed/' . end($youUrl) . '" width="100%" height="350px" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowFullscreen class="content-image" />';
        }

        return $html;
    }

}