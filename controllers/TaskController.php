<?php
class TaskController extends Kwf_Controller_Action_Auto_Form
{
    protected $_modelName = 'Tasks';
    protected $_permissions = array('save', 'add');
    protected $_paging = 0;
    protected $_buttons = array('save');

    protected function _initFields()
    {        
        $this->_form->add(new Kwf_Form_Field_TextField('title', trl('Title')))
        ->setWidth(400)
        ->setAllowBlank(false);
        
        $this->_form->add(new Kwf_Form_Field_DateField('startDate', trl('Start Date')));
        $this->_form->add(new Kwf_Form_Field_DateField('endDate', trl('End Date')));
        
        $this->_form->add(new Kwf_Form_Field_TextArea('description', trl('Description')))
        ->setHeight(70)
        ->setWidth(400);

        $taskTypeModel = Kwf_Model_Abstract::getInstance('LinkData');
        $taskTypeSelect = $taskTypeModel->select()->whereEquals('name', 'Types');
        
        $this->_form->add(new Kwf_Form_Field_Select('typeId', trl('Type')))
        ->setValues($taskTypeModel)
        ->setSelect($taskTypeSelect)
        ->setWidth(400)
        ->setAllowBlank(false);
        
        $this->_form->add(new Kwf_Form_Field_Checkbox('status', trl('Done')));
    }
    
    protected function _beforeInsert(Kwf_Model_Row_Interface $row)
    {
        $users = Kwf_Registry::get('userModel');
        
        $row->userId = $users->getAuthedUserId();
        $row->status = 0;
    }
}
