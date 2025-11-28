<?php

namespace App\Models;

class ContentRowsModel extends MainModel
{
    protected $table = "post_content_rows";
    protected $primaryKey = "id";
    protected $allowedFields = [
        "post_id",
        "type", // header | paragraph | list | image
        "text",
        "level",
        "url",
        "img_caption",
        "lang"

    ];
    protected $returnType = 'object';
}