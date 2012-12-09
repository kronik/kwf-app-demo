<?php
class LinkDataController extends Kwf_Controller_Action_Auto_Grid
{
    protected $_modelName = 'LinkData';
    protected $_defaultOrder = 'id';
    protected $_paging = 0;
    protected $_buttons = array('add', 'delete');
    protected $_editDialog = array(
        'controllerUrl' => '/link-dataentry',
        'width' => 600,
        'height' => 200
    );

    protected function _initColumns()
    {
        $this->_filters = array('text' => array('type' => 'TextField'));
        $this->_columns->add(new Kwf_Grid_Column('value', trlKwf('Value')))
        ->setWidth(300);
        $this->_columns->add(new Kwf_Grid_Column('desc', trlKwf('Description')))
            ->setRenderer('nl2Br')
            ->setWidth(300);
    }

    protected function _getWhere()
    {
        $ret = parent::_getWhere();
        $ret['link_id = ?'] = $this->_getParam('link_id');
        return $ret;
    }
}
