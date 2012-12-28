<?php
class Tasks extends Kwf_Model_Db
{
    protected $_table = 'tasks';
    protected $_referenceMap = array(
        'Type' => array(
            'column'           => 'typeId',
            'refModelClass'    => 'LinkData'
        )
    );

    protected function _init()
    {
        parent::_init();
        $this->_exprs['type_value'] = new Kwf_Model_Select_Expr_Parent('Type', 'value');
    }
}
