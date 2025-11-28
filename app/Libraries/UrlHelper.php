<?php


namespace App\Libraries;


class UrlHelper
{

    public static function slugify1($text, $divider = '-')
    {
        // replace non letter or digits by divider
        $text = preg_replace('~[^\pL\d]+~u', $divider, $text);

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // trim
        $text = trim($text, $divider);

        // remove duplicate divider
        $text = preg_replace('~-+~', $divider, $text);

        // lowercase
        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }

    public static function slugify(string $text, bool $preserveUnicode = false): string
    {
        // Trim whitespace
        $text = trim($text);

        // --- 1. Transliteration ---
        if (!$preserveUnicode) {
            if (class_exists('Transliterator')) {
                // Convert any script to Latin, then remove accents
                $trans = \Transliterator::create('Any-Latin; Latin-ASCII;');
                if ($trans) {
                    $text = $trans->transliterate($text);
                }
            } elseif (function_exists('iconv')) {
                $converted = @iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $text);
                if ($converted !== false) {
                    $text = $converted;
                }
            }
        }

        // --- 2. Remove unwanted characters ---
        if ($preserveUnicode) {
            // Keep letters/numbers in any language
            $text = preg_replace('/[^\p{L}\p{N}\s-]+/u', '', $text);
        } else {
            // Only keep ASCII letters, numbers, spaces, hyphens
            $text = preg_replace('/[^A-Za-z0-9\s-]+/', '', $text);
        }

        // --- 3. Convert spaces & underscores to hyphens ---
        $text = preg_replace('/[\s_-]+/', '-', $text);

        // --- 4. Convert to lowercase (multibyte safe) ---
        if (function_exists('mb_strtolower')) {
            $text = mb_strtolower($text, 'UTF-8');
        } else {
            $text = strtolower($text);
        }

        // --- 5. Trim hyphens from start & end ---
        $text = trim($text, '-');

        // Return "n-a" if empty
        return $text !== '' ? $text : 'n-a';
    }

}