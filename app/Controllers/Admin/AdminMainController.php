<?php
/**
 * @author Harut
 */

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Libraries\AuthUtils;
use App\Libraries\DbUtils;
use App\Models\AdminLabelsModel;
use App\Models\LangModel;
use CodeIgniter\Model;

class AdminMainController extends BaseController
{

    public $userData = null;
    public array $pageData = [];
    public array $langList = [];

    private array $defaultLangList = ['en' => 'English', 'hy' => 'Հայերեն', 'ru' => 'Русский'];


    public string $currentView = '';


    var array $scripts = [];


    public function __construct()
    {


        $this->defaults();
    }


    private function defaults()
    {
        $config = config('AdminMenu');


        $this->pageData['validation'] = null;
        $this->pageData['scripts'] = '';

        $this->pageData['isCropper'] = false;

        AuthUtils::checkRememberMe();

        if (session()->get('adminUser')) {
            $this->userData = session()->get('adminUser');
        }

        $langModel = new LangModel();
        $langList = array_column($langModel->findAll(), 'title', 'lang');

        if (!empty($langList)) {
            $this->pageData['langList'] = $langList;
            $this->langList = $langList;
        } else {
            $this->pageData['langList'] = $this->defaultLangList;
            $this->langList = $this->defaultLangList;
        }


        $adminLabels = new AdminLabelsModel();
        $this->pageData['labels'] = array_column($adminLabels->getAllItems('en'), 'text', 'key');

        $renderer = service('renderer');
        $rendererPageData = ['pageData' => $this->pageData];

        if (isset($config->menu)) {
            $rendererPageData['menu'] = $config->menu;
        }
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

        return view('Admin/Layout/' . $layout, $this->pageData);
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


    /**
     * @param Model $model
     * @return array
     */
    protected function postsPagination(Model $model, $selectFields = ['t.*'], $where = [], $order = false): array
    {
        $tbl = $model->table;


        if (!empty($where)) {

            $query = $model
                ->select(implode(',', $selectFields))
                ->from("{$tbl} t")
                ->where(DbUtils::customQueryBuilder($where))
                ->groupBy('t.id');

        } else {

            $query = $model
                ->select(implode(',', $selectFields))
                ->from("{$tbl} t")
                ->groupBy('t.id');
        }


        if (isset($order['col']) && isset($order['sort'])) {
            $query->orderBy($order['col'], $order['sort']);
        }


        $data['items'] = $query->paginate(ADMIN_PER_PAGE); // 5 items per page
        // Create pager links
        $data['pager'] = $query->pager;

        return $data;
    }

    /**
     * @param Model $model
     * @return array
     */
    protected function pagination(Model $model, $where = []): array
    {
        $data['items'] = $model->paginate(ADMIN_PER_PAGE); // 5 items per page

        // Create pager links
        $data['pager'] = $model->pager;

        return $data;
    }

    /**
     * @param Model $model
     * @param string[] $selectFields
     * @param string $lang
     * @return array
     */
    protected function paginationMl(Model $model, $selectFields = ['t.id', 't.status', 'tML.title'], $where = [], $lang = ADMIN_DEF_LANG, $order = false): array
    {
        $tbl = $model->table;
        $tblMl = $model->table . ML_TABLE;


        if (!empty($where)) {


            $query = $model
                ->select(implode(',', $selectFields))
                ->from("{$tbl} t")
                ->where(DbUtils::customQueryBuilder($where))
                ->join("{$tblMl} tML", "t.id = tML.parent_id AND tML.lang = '{$lang}'", 'INNER')
                ->groupBy('t.id,tMl.id');

        } else {

            $query = $model
                ->select(implode(',', $selectFields))
                ->from("{$tbl} t")
                ->join("{$tblMl} tML", "t.id = tML.parent_id AND tML.lang = '{$lang}'", 'INNER')
                ->groupBy('t.id,tMl.id');
        }

        if (isset($order['col']) && isset($order['sort'])) {
            $query->orderBy($order['col'], $order['sort']);
        } else {
            $query->orderBy("t.id", 'DESC');

        }

        $data['items'] = $query->paginate(ADMIN_PER_PAGE); // 5 items per page

        // Create pager links
        $data['pager'] = $query->pager;

        return $data;
    }

}