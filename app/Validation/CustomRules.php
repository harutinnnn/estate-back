<?php

namespace App\Validation;

class CustomRules
{

    public function isHaveImage(string $images): bool
    {

        $isOk = false;

        $tmpImages = session()->get("tmp-images");


        if (!empty($tmpImages)) {
            foreach ($tmpImages as $image) {

                if (is_file(FCPATH . $image['path'])) {
                    $isOk = true;
                }
            }
        }
        return $isOk;
    }
}
