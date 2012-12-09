<?php
class LinkData extends Kwf_Model_Db
{
    protected $_table = 'link_data';
    protected $_referenceMap = array(
        'Link' => array(
            'column'           => 'link_id',
            'refModelClass'     => 'Links',
        )
    );
}
