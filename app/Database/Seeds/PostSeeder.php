<?php


namespace App\Database\Seeds;


use App\Libraries\ImageHelper;
use App\Libraries\UrlHelper;
use App\Models\LangModel;
use App\Models\NewsCategoryModel;
use CodeIgniter\Database\Seeder;
use Faker\Factory;
use function CodeIgniter\Autoloader\search;

class PostSeeder extends Seeder
{

    public function run()
    {
        //php spark db:seed PostSeeder
        $newsCategoryModel = new NewsCategoryModel();
        $newsCategories = $newsCategoryModel->getAllItems('en', 0, false, [
            'col' => 'pos',
            'sort' => 'ASC',
        ]);


        $categories = array_keys(array_column($newsCategories, 'title', 'id'));


        $faker = Factory::create();

        $data = [];

        $langList = ['en', 'hy', 'ru'];

        for ($i = 0; $i < 500; $i++) {
            $insertId = 0;
            foreach ($langList as $lng) {

                $img = NULL;

                $image = ImageHelper::fakeImage(FCPATH . 'uploads/posts');
                if (isset($image['name']) && is_file($image['path'])) {

                    $img = $image['name'];
                }


                $title = $faker->text(50);
                $contentGenerator = $this->contentGenerator($faker);


                $editor_json_data = $contentGenerator['data'];
                $content = $contentGenerator['html'];

                $data = [
                    'status' => 1,
                    'cat_id' => $categories[rand(0, count($categories) - 1)],
                    'related_id' => $insertId,
                    'title' => $title,
                    'content' => $content,
                    'lang' => $lng,
                    'img' => $img,
                    'searchfield' => $title . strip_tags($content),
                    'slug' => UrlHelper::slugify($title),
                    'created_at' => date('Y-m-d h:i:s'),
                    'updated_at' => date('Y-m-d h:i:s'),
                    'editor_json_data' => json_encode($editor_json_data)
                ];

                $this->db->table('posts')->insert($data);

                if ($lng == 'en') {
                    $insertId = $this->db->insertID();
                }
            }

        }
    }


    protected function contentGenerator($faker)
    {

        $contentData = [
            'html' => "",
            'data' => [
                'time' => time(),
                'blocks' => [
                ]
            ]

        ];

        $randParagraphs = rand(1, 10);

        for ($i = 0; $i < $randParagraphs; $i++) {

            if ($i == 0) {
                $title = $faker->text(50);
                $contentData['html'] .= '<h2>' . $title . '</h2>';

                $contentData['data']['blocks'][] = [
                    'id' => uniqid(),
                    'type' => 'header',
                    'data' => [
                        'level' => 2,
                        'text' => $title,
                    ]
                ];
            } else if ($i == 4 && $i < $randParagraphs) {
                $title = $faker->text(50);
                $contentData['html'] .= '<h2>' . $title . '</h2>';

                $contentData['data']['blocks'][] = [
                    'id' => uniqid(),
                    'type' => 'header',
                    'data' => [
                        'level' => 2,
                        'text' => $title,
                    ]
                ];
            }


            $content = $faker->realText(1000);
            $contentData['html'] .= '<p>' . $content . '</p>';

            $contentData['data']['blocks'][] = [
                'id' => uniqid(),
                'type' => 'paragraph',
                'data' => [
                    'text' => $content,
                ]
            ];

        }

        return $contentData;

    }


}