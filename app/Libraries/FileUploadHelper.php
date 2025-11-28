<?php


namespace App\Libraries;


class FileUploadHelper
{

    public static function imageUpload($fileName = '', $folderName = '', $data = [], $model = null)
    {


        try {


            if (isset($model->{$fileName}) && is_file(FCPATH . 'uploads' . DIRECTORY_SEPARATOR . $folderName . DIRECTORY_SEPARATOR . $model->{$fileName})) {
                unlink(FCPATH . 'uploads' . DIRECTORY_SEPARATOR . $folderName . DIRECTORY_SEPARATOR . $model->{$fileName});
            }

            $file = service('request')->getFile($fileName);

            if ($file->isValid() && !$file->hasMoved()) {

                $newName = $file->getRandomName();

                $filePath = FCPATH . 'uploads' . DIRECTORY_SEPARATOR . $folderName . DIRECTORY_SEPARATOR . $newName;
                $file->move(FCPATH . 'uploads' . DIRECTORY_SEPARATOR . $folderName, $newName);

                ImageHelper::resizeAndConvert($filePath, $filePath, 1920, 1080, 'jpg');

                $data['img'] = $newName;
            }

        } catch (\Throwable $e) {
            die($e->getMessage());
        }

        return $data;
    }


    public static function croppedImageUpload($fileName = '', $folderName = '', $data = [], $model = null, $base64Img = '')
    {

        try {

            if (isset($model->{$fileName}) && is_file(FCPATH . 'uploads' . DIRECTORY_SEPARATOR . $folderName . DIRECTORY_SEPARATOR . $model->{$fileName})) {
                unlink(FCPATH . 'uploads' . DIRECTORY_SEPARATOR . $folderName . DIRECTORY_SEPARATOR . $model->{$fileName});
            }


            $imageName = self::base64_to_img($base64Img, FCPATH . 'uploads' . DIRECTORY_SEPARATOR . $folderName . DIRECTORY_SEPARATOR);
            $filePath = FCPATH . 'uploads' . DIRECTORY_SEPARATOR . $folderName . DIRECTORY_SEPARATOR . $imageName;
            ImageHelper::resizeAndConvert($filePath, $filePath, 1920, 1080, 'jpg');

            $data['img'] = $imageName;
        } catch (\Throwable $e) {
            die($e->getMessage());
        }

        return $data;
    }


    /**
     * @param $base64_string
     * @param $output_file
     * @return mixed
     */
    public static function base64_to_img($base64_string, $output_file)
    {

        if (!is_dir($output_file)) {
            @mkdir($output_file);
        }
        // split the string on commas
        // $data[ 0 ] == "data:image/png;base64"
        // $data[ 1 ] == <actual base64 string>
        $data = explode(',', $base64_string);

        $extExplode = explode('/', $data[0]);
        $extExplode1 = explode(';', end($extExplode));


        $fileName = md5(time()) . '.' . reset($extExplode1);
        $path = $output_file . $fileName;

        // open the output file for writing
        $ifp = fopen($path, 'wb');
        // we could add validation here with ensuring count( $data ) > 1
        fwrite($ifp, base64_decode($data[1]));
        // clean up the file resource
        fclose($ifp);

        return $fileName;
    }


    public static function postImageUpload($fileName = '', $folderName = '')
    {


        try {


            if (isset($model->{$fileName}) && is_file(FCPATH . 'uploads' . DIRECTORY_SEPARATOR . $folderName . DIRECTORY_SEPARATOR . $model->{$fileName})) {
                unlink(FCPATH . 'uploads' . DIRECTORY_SEPARATOR . $folderName . DIRECTORY_SEPARATOR . $model->{$fileName});
            }

            $file = service('request')->getFile($fileName);

            if ($file->isValid() && !$file->hasMoved()) {

                $newName = $file->getRandomName();

                $filePath = FCPATH . 'uploads' . DIRECTORY_SEPARATOR . $folderName . DIRECTORY_SEPARATOR . $newName;
                $file->move(FCPATH . 'uploads' . DIRECTORY_SEPARATOR . $folderName, $newName);

                ImageHelper::resizeAndConvert($filePath, $filePath, 1920, 1080, 'jpg');

                $data['img'] = $newName;
            }

        } catch (\Throwable $e) {
            die($e->getMessage());
        }

        return $data;
    }

}