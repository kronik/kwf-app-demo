<?php
class LangclubgroupsfilterController extends Kwf_Controller_Action_Auto_Grid
{
    protected function _initColumns()
    {
        $dataSet = array();
        
        $membersModel = Kwf_Model_Abstract::getInstance('Members');
        $membersSelect = $membersModel->select()->whereEquals('visible', '1');

        $groupModel = Kwf_Model_Abstract::getInstance('MemberLanguages');

        $members = $membersModel->getRows($membersSelect);
        
        foreach ($members as $member)
        {
            $groupSelect = $groupModel->select()->whereEquals('member_id', $member->id);
            $groups = $groupModel->getRows($groupSelect);
            
            foreach ($groups as $group)
            {
                array_push($dataSet, array('id'=>$member->id, 'name'=>(string)$member, 'langId'=>$group->language_id));
            }
        }
                
        $this->_model = new Kwf_Model_FnF(array('data' => $dataSet));
            
        $this->_columns[] = new Kwf_Grid_Column('id');
        $this->_columns[] = new Kwf_Grid_Column('name');
        $this->_columns[] = new Kwf_Grid_Column('langId');
    }
    
    protected function _getSelect()
    {        
        $ret = parent::_getSelect();
        if ($this->_getParam('id'))
        {
            $ret->whereEquals('langId', $this->_getParam('id'));
        }
        
        return $ret;
    }
}
