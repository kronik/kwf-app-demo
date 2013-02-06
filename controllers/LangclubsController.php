<?php
class LangclubsController extends Kwf_Controller_Action_Auto_Grid
{
    protected $_modelName = 'Langclubs';
    protected $_defaultOrder = array('field' => 'id', 'direction' => 'DESC');
    protected $_paging = 30;
    protected $_buttons = array('add');

    public function indexAction()
    {
        $this->view->ext('Langclubs');
    }
    
    protected function _initColumns()
    {
        $this->_filters = array('text' => array('type' => 'TextField'));
        $this->_columns->add(new Kwf_Grid_Column('title', trl('Title'), 200));
    }    
}
