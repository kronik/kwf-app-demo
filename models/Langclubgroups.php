<?php
class Langclubgroups extends Kwf_Model_Db
{
    protected $_table = 'lang_club_groups';
    protected $_referenceMap = array(
        'Member' => array(
            'column'           => 'userId',
            'refModelClass'     => 'Members',
        )
    );
}
