<?php
class LangclubgroupsController extends Kwf_Controller_Action_Auto_Grid
{
    protected $_modelName = 'Langclubgroups';
    protected $_defaultOrder = array('field' => 'id', 'direction' => 'ASC');
    protected $_paging = 10;
    protected $_buttons = array('add', 'delete');
    protected $_editDialog = array(
        'controllerUrl' => '/langclubgroup',
        'width' => 550,
        'height' => 160
    );

    protected function _initColumns()
    {
        $this->_filters = array('text' => array('type' => 'TextField'));
        
        $this->_columns->add(new Kwf_Grid_Column_Button('edit'));
        $this->_columns->add(new Kwf_Grid_Column('id', trl('Code')))->setWidth(150);
    }

    protected function _getWhere()
    {
        $ret = parent::_getWhere();
        $ret['clubId = ?'] = $this->_getParam('clubId');
        return $ret;
    }
}
