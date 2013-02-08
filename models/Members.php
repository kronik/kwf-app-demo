<?php
class Members extends Kwf_Model_Db
{
    protected $_table = 'members';
    protected $_rowClass = 'Row_Member';
    protected $_referenceMap = array(
        'Picture' => array(
            'column'           => 'picture_id',
            'refModelClass'     => 'Kwf_Uploads_Model'
        )
    );
    protected $_dependentModels = array(
        'MemberLanguages' => 'MemberLanguages'
    );
    protected $_toStringField = 'name';

    protected function _init()
    {
        parent::_init();
        $this->_exprs['name'] = new Kwf_Model_Select_Expr_Concat(array(
            new Kwf_Model_Select_Expr_Field('lastname'),
            new Kwf_Model_Select_Expr_String(' '),
            new Kwf_Model_Select_Expr_Field('firstname'),
        ));
    }
}
