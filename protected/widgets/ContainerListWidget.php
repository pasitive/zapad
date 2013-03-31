<?php
/**
 * Created by JetBrains PhpStorm.
 * User: denisboldinov
 * Date: 7/8/12
 * Time: 8:23 PM
 * To change this template use File | Settings | File Templates.
 */
class ContainerListWidget extends CWidget
{

    public $viewFile;

    public $itemView;

    public $viewData = array();

    private $_dataProvider;

    private $_model;

    public function getModel()
    {
        return $this->_model;
    }

    public function init()
    {
        if (empty($this->itemView)) {
            $this->itemView = 'containerWidget/_view';
        }

        if (empty($this->viewFile)) {
            $this->viewFile = 'containerWidget/list';
        }

        $this->_model = new Apartment('search');
        $model = $this->model;

        $model->unsetAttributes();

        $model->is_published = 1;
        $model->container = 1;

        $this->_dataProvider = $model->search();
        $this->_dataProvider->pagination->pageSize = 999;
    }

    public function run()
    {
        $this->render($this->viewFile, array(
            'dataProvider' => $this->_dataProvider,
            'itemView' => $this->itemView,
            'pager' => array(
                'pageSize' => 9999,
            ),
            'model' => $this->getModel(),
        ));
    }
}
