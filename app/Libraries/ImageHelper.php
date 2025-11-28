<?php


namespace App\Libraries;


use Faker\Factory;

class ImageHelper
{


    public static function resizeAndConvert($sourcePath, $destPath, $maxWidth, $maxHeight, $format = 'jpg', $quality = 85)
    {
        // Detect image type
        $info = getimagesize($sourcePath);
        if ($info === false) {
            throw new Exception("Invalid image file.");
        }

        [$width, $height, $type] = $info;

        // Load source image
        switch ($type) {
            case IMAGETYPE_JPEG:
                $src = imagecreatefromjpeg($sourcePath);
                break;
            case IMAGETYPE_PNG:
                $src = imagecreatefrompng($sourcePath);
                imagepalettetotruecolor($src);
                imagealphablending($src, true);
                imagesavealpha($src, true);
                break;
            case IMAGETYPE_WEBP:
                $src = imagecreatefromwebp($sourcePath);
                break;
            default:
                throw new Exception("Unsupported image type.");
        }

        // Calculate new dimensions
        $ratio = min($maxWidth / $width, $maxHeight / $height);
        $newWidth = (int)($width * $ratio);
        $newHeight = (int)($height * $ratio);

        // Create new image canvas
        $dst = imagecreatetruecolor($newWidth, $newHeight);

        // Preserve transparency for PNG & WEBP
        if (in_array($format, ['png', 'webp'])) {
            imagealphablending($dst, false);
            imagesavealpha($dst, true);
            $transparent = imagecolorallocatealpha($dst, 0, 0, 0, 127);
            imagefilledrectangle($dst, 0, 0, $newWidth, $newHeight, $transparent);
        }

        // Resize
        imagecopyresampled($dst, $src, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

        // Save in requested format
        switch (strtolower($format)) {
            case 'jpg':
            case 'jpeg':
                imagejpeg($dst, $destPath, $quality);
                break;
            case 'png':
                $pngQuality = 9 - floor($quality / 10);
                imagepng($dst, $destPath, $pngQuality);
                break;
            case 'webp':
                imagewebp($dst, $destPath, $quality);
                break;
            default:
                throw new Exception("Unsupported output format.");
        }

        // Cleanup
        imagedestroy($src);
        imagedestroy($dst);
    }


    public static function fakeImage($savePath = null)
    {
        $data = null;


        if ($savePath && strlen(trim($savePath)) && is_dir($savePath)) {

            $faker = Factory::create();

            $url = "https://picsum.photos/seed/" . $faker->uuid . "/640/480";
            $filename = uniqid('img_') . '.jpg';

            $path = $savePath . '/' . $filename;
            file_put_contents($path, file_get_contents($url));

            $data = ['path' => $path, 'name' => $filename];
        }

        return $data;
    }

}