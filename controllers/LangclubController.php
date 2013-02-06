<?php
class LangclubController extends Kwf_Controller_Action_Auto_Form
{
    protected $_modelName = 'Langclubs';
    protected $_permissions = array('save', 'add');
    protected $_paging = 0;
    protected $_buttons = array('save');

    protected function _initFields()
    {        
        $this->_form->add(new Kwf_Form_Field_TextField('title', trl('Title')))
        ->setWidth(400)
        ->setAllowBlank(false);       
    }    
}
