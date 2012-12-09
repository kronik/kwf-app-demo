<?php
class LinkDataEntryController extends Kwf_Controller_Action_Auto_Form
{
    protected $_permissions = array('save', 'add');
    protected $_modelName = 'LinkData';

    protected function _initFields()
    {
        $this->_form->add(new Kwf_Form_Field_TextField('value', trlKwf('Value')))
        ->setWidth(450);
        $this->_form->add(new Kwf_Form_Field_TextArea('desc', trlKwf('Description')))
            ->setWidth(450);
    }

    protected function _beforeInsert(Kwf_Model_Row_Interface $row)
    {
        $m = Kwf_Model_Abstract::getInstance('Links');
        
        $s = $m->select() //returns a Kwf_Model_Select object use new Kwf_Model_Select() alternatively
        ->whereEquals('id', $this->_getParam('link_id'));
        $prow = $m->getRow($s);
        
        $row->link_id = $this->_getParam('link_id');
        $row->name = $prow->name;
    }
}
