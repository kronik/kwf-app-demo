<?php
class LinksController extends Kwf_Controller_Action_Auto_Grid
{
    protected $_modelName = 'Links';
    protected $_defaultOrder = 'name';
    protected $_paging = 0;
    protected $_buttons = array('add');
    protected $_editDialog = array(
                                   'controllerUrl' => '/link',
                                   'width' => 500,
                                   'height' => 100
                                   );
    public function indexAction()
    {
        $this->view->ext('Links');
    }
    
    protected function _initColumns()
    {
        $this->_filters = array('text' => array('type' => 'TextField'));
        $this->_columns->add(new Kwf_Grid_Column('name', trlKwf('Title'), 400));
        #->setEditor(new Kwf_Form_Field_TextField());
    }
}
