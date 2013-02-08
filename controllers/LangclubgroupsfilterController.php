<?php
class LangclubgroupsfilterController extends Kwf_Controller_Action_Auto_Grid
{
    protected $_model = 'Members';
    protected function _initColumns()
    {
        $this->_columns[] = new Kwf_Grid_Column('id');
        $this->_columns[] = new Kwf_Grid_Column('name');
    }
    
    protected function _getSelect()
    {        
        $ret = parent::_getSelect();
        if ($this->_getParam('langId')) {
            $s = new Kwf_Model_Select();
            $s->whereEquals('language_id', $this->_getParam('langId'));
            $ret->where(new Kwf_Model_Select_Expr_Child_Contains('MemberLanguages', $s));
        }
        return $ret;
    }
}
