<?php


namespace App\Controllers;


use App\Controllers\Admin\FrontendLabels;
use App\Libraries\DbUtils;
use App\Libraries\LangUtils;
use App\Models\ContentModel;
use App\Models\FrontendLabelsModel;
use App\Models\LangModel;
use App\Models\MenuModel;
use App\Models\MenuSectionsModel;
use App\Models\NewsCategoryModel;
use CodeIgniter\Model;
use Config\App;

class MainController extends BaseController
{

    public array $pageData = [];
    public $_lang;
    public $slug = '/';

    var array $scripts = [];
    public string $currentView = '';

    public function __construct()
    {

        $this->defaults();

    }

    protected function defaults()
    {

        $config = new App();
        $this->_lang = $config->defaultLocale;

        $uri = service('uri');

        $firstSegment = $uri->getSegment(1);
        $secondSegment = $uri->setSilent()->getSegment(2);


        $langModel = new LangModel();
        $langList = array_column($langModel->where('status', 1)->findAll(), 'title', 'lang');


        if (in_array($firstSegment, array_keys($langList))) {
            $this->_lang = $firstSegment;
            $this->slug = $secondSegment;
        } else {
            $this->_lang = $config->defaultLocale;
            $this->slug = $firstSegment;
        }


        $newsCategoryModel = new NewsCategoryModel();
        $newsCategories = $newsCategoryModel->getAllItems($this->_lang, 0, ['status' => 1], [
            'col' => 'pos',
            'sort' => 'ASC',
        ]);


        $this->pageData['newsCategories'] = $newsCategories;
        $this->pageData['catList'] = array_column($newsCategories, 'title', 'id');
        $this->pageData['catSlugs'] = array_column($newsCategories, 'slug', 'id');

        $this->pageData['langList'] = $langList;

        $langPageLinks = LangUtils::langLinksBuilder($langList);
        $this->pageData['langPageLinks'] = $langPageLinks;


        $menuModel = new MenuModel();

        $menuObj = $menuModel->getItemByUrl($this->slug, $this->_lang);
        $this->pageData['menuObj'] = $menuObj;

        $this->pageData['_lang'] = $this->_lang;

        $content = null;
        $contentModel = new ContentModel();
        if (isset($menuObj->cid)) {
            $content = $contentModel->getItem($menuObj->cid, $this->_lang);
        }

        $this->pageData['content'] = $content;


        $mainMenu = [];
        $footerMenu = [];

        $menuSectionModel = new MenuSectionsModel();

        $mainSection = $menuSectionModel->where('url', 'main-menu')->first();
        $sectionId = isset($mainSection->id) ? $mainSection->id : 0;


        if ($sectionId) {

            $mainMenu = $menuModel->getAllItems($this->_lang, 0, 0, ['t.section_id' => $sectionId, 't.pid' => 0], ['col' => 'pos', 'sort' => 'ASC']);

            if (!empty($mainMenu)) {
                foreach ($mainMenu as $mainMenuItem) {
                    $mainMenuItem->nodes = $menuModel->getAllItems($this->_lang, 0, 0, ['t.section_id' => $sectionId, 't.pid' => $mainMenuItem->id], ['col' => 'pos', 'sort' => 'ASC']);
                }
            }
            $this->pageData['mainMenu'] = $mainMenu;
        }


        $this->pageData['currentPage'] = strlen(trim($this->slug)) ? $this->slug : '/';

        $FrontendLabels = new FrontendLabelsModel();
        $this->pageData['labels'] = array_column($FrontendLabels->getAllItems($this->_lang, 0, 0, ['type' => LABEL_INPUT]), 'text', 'key');


        $renderer = service('renderer');
        $rendererPageData = ['pageData' => $this->pageData];


        $renderer->setData($rendererPageData);

    }


    /**
     * @param string $layout
     * @return string
     */
    protected function render($layout = 'main'): string
    {
        $this->pageData['currentView'] = $this->currentView;

        $this->_getScripts();

        return view('Layout/' . $layout, $this->pageData);
    }


    function _addScript($fileName)
    {
        $this->scripts[$fileName] = 1;
    }


    function _getScripts()
    {
        $scripts = array_keys($this->scripts);
        foreach ($scripts as $script) {
            $this->pageData['scripts'] .= '<script type="text/javascript" language="javascript" src="' . site_url($script) . '"></script>';
            $this->pageData['scripts'] .= "\n";
        }
    }
}