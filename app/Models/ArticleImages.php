<?php

namespace App\Models;

use CodeIgniter\Model;

class ArticleImages extends MainModel
{
    protected $table = "article_images";
    protected $primaryKey = "id";
    protected $allowedFields = [
        "article_id",
        "img",
    ];

    protected $returnType = 'object';

    public function getList($where = false, $select = '*'): array
    {

        $query = $this->select($select);

        if (count($where) && is_array($where)) {
            $query->where($where);
        }

        return $query->findAll();

    }

    public static function saveArticleImage(int $articleId, string $imgBase64, $userId): int
    {

        $lid = 0;

        try {

            if (preg_match('/^data:image\/(\w+);base64,/', $imgBase64, $type)) {
                $imgBase64 = substr($imgBase64, strpos($imgBase64, ',') + 1);
                $extension = strtolower($type[1]); // jpg, png, webp
            } else {
                throw new \Exception('Invalid base64 image format');
            }

            // Decode
            $imageData = base64_decode($imgBase64);
            if ($imageData === false) {
                throw new \Exception('Base64 decode failed');
            }

            $uploadDirPath = FCPATH . 'uploads' . DIRECTORY_SEPARATOR . '/articles/' . DIRECTORY_SEPARATOR . $userId;


            if (!is_dir($uploadDirPath)) {
                mkdir($uploadDirPath, '0777', true);
            }

            // Save image
            $fileName = uniqid() . '.' . $extension;

            $fileAbsPath = $uploadDirPath . DIRECTORY_SEPARATOR . $fileName;

            $filePath = '/uploads/articles/' . $userId . '/' . $fileName;

            file_put_contents($fileAbsPath, $imageData);

            $imgData = [
                'article_id' => $articleId,
                'img' => $filePath
            ];
            $imgModel = new ArticleImages();
            $lid = $imgModel->insert($imgData);


        } catch (\Exception $e) {


            var_dump($e->getMessage());
        }

        return $lid;
    }
}