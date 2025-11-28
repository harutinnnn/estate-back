<?php


namespace App\Libraries;


use App\Models\FrontendLabelsModel;
use App\Models\PostsModel;

class LangUtils
{

    /**
     * @param $key
     * @param $lang
     * @return mixed
     */
    public static function getLabelContent($key, $lang)
    {
        $model = new FrontendLabelsModel();
        $row = $model->getItemByKey($key, $lang);

        return isset($row->text) ? $row->text : $key;
    }


    /**
     * @param $langList
     * @return array
     */
    public static function langLinksBuilder($langList): array
    {
        $langPageLinks = [];
        $currentUrl = str_replace(site_url(), '', current_url());

        foreach ($langList as $langKey => $langValue) {

            $currentUrlExplode = explode('/', $currentUrl);
            if (count($currentUrlExplode) > 1) {

                $currentUrlExplode[0] = $langKey;
                $langPageLinks[$langKey] = implode('/', $currentUrlExplode);
            } else {
                $langPageLinks[$langKey] = $langKey;
            }
        }
        return $langPageLinks;
    }

    /**
     * @param $langList
     * @return array
     */
    public static function langLinksBuilderPost(): array
    {

        $langPageLinks = [];
        $uri = service('uri');
        $idSegment = $uri->getSegment(4);

        $catSegment = $uri->getSegment(2);


        $postModel = new PostsModel();
        $item = $postModel->find($idSegment);

        if (!empty($item)) {


            if (isset($item->related_id) && $item->related_id) {

                $rel_items = $postModel
                    ->orWhere(['id' => $item->related_id])
                    ->orWhere(['related_id' => $item->related_id])
                    ->findAll();
            } else {
                $rel_items = $postModel
                    ->orWhere(['id' => $item->id])
                    ->orWhere(['related_id' => $item->id])
                    ->findAll();
            }


            if (!empty($rel_items)) {

                foreach ($rel_items as $rel_item) {
                    $langPageLinks[$rel_item->lang] = $rel_item->lang . '/' . $catSegment . '/' . $rel_item->slug . '/' . $rel_item->id;
                }
            }
        }

        return $langPageLinks;
    }

}