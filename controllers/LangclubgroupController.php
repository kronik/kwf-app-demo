<?php
class LangclubgroupController extends Kwf_Controller_Action_Auto_Form
{
    protected $_modelName = 'Langclubgroups';
    protected $_permissions = array('save', 'add');
    protected $_paging = 0;

    protected function _initFields()
    {
        $typeModel = Kwf_Model_Abstract::getInstance('Kwf_Util_Model_Pool');
        $typeSelect = $typeModel->select()
            ->whereEquals('pool', 'Languages')
            ->whereEquals('visible', 1)
            ->order('pos', 'ASC');
        
        $lang = new Kwf_Form_Field_Select('langId', trl('Language'));
        $lang->setValues($typeModel->getRows($typeSelect));
        //$lang->setSave(false);
        $lang->setAllowBlank(false);
        $lang->setWidth(400);
        
        $users = new Kwf_Form_Field_Select('userId', trl('User'));
        $users->setValues('/langclubgroupsfilter/json-data');
        $users->setAllowBlank(false);
        $users->setWidth(400);
        
        $this->_form->add(new Kwf_Form_Field_FilterField())
        ->setFilterColumn('langId')
        ->setFilteredField($users)
        ->setFilterField($lang)
        ->setWidth(400); 
    }

    protected function _beforeInsert(Kwf_Model_Row_Interface $row)
    {
        $row->clubId = $this->_getParam('clubId');
    }
}
