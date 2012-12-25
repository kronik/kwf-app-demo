<?php
class TasksController extends Kwf_Controller_Action_Auto_Grid
{
    protected $_modelName = 'Tasks';
    protected $_defaultOrder = array('field' => 'id', 'direction' => 'DESC');
    protected $_paging = 30;
    protected $_buttons = array('add');

    public function indexAction()
    {
        $this->view->ext('Tasks');
    }
    
    protected function _initColumns()
    {
        $this->_filters = array('text' => array('type' => 'TextField'));
        $this->_columns->add(new Kwf_Grid_Column('title', trl('Title'), 200));

        $taskTypeModel = Kwf_Model_Abstract::getInstance('LinkData');
        $taskTypeSelect = $taskTypeModel->select()->whereEquals('name', 'Types');

        $select = new Kwf_Form_Field_Select();
        $select->setValues($taskTypeModel);
        $select->setSelect($taskTypeSelect);
        
        $this->_columns->add(new Kwf_Grid_Column('typeId', trl('Type')))
        ->setEditor($select)
        ->setType('string')
        ->setShowDataIndex('value');

        $this->_columns->add(new Kwf_Grid_Column_Date('endDate', trl('End Date'), 100))->setRenderer('checkDate');
    }
    
    protected function _getWhere()
    {
        $users = Kwf_Registry::get('userModel');
        
        $ret = parent::_getWhere();
        
        $ret['status = ?'] = 0;
        $ret['userId = ?'] = $users->getAuthedUserId();
        return $ret;
    }
}
