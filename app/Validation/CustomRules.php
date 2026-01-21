<?php

namespace App\Validation;

class CustomRules
{

    public function checkImages($value, string $params, array $data): bool
    {

        if (!is_array($value)) {
            return false;
        }

        foreach ($value as $tag) {

            // trim & basic checks
            $tag = trim($tag);

            if ($tag === '') {
                return false;
            }

            // example: only letters, numbers, dash
            if (!preg_match('/^[a-z0-9\-]+$/i', $tag)) {
                return false;
            }

            // example: max length
            if (strlen($tag) > 30) {
                return false;
            }
        }

        return true;


    }
}
