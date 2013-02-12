<?php
class Acl extends Kwf_Acl
{
    public function __construct()
    {
        parent::__construct();
        $this->remove('default_index');

        $this->addResource(new Kwf_Acl_Resource_MenuDropdown('default_menuitem', array('text'=>trlKwf('Dictionaries'), 'icon'=>'user.png')));

        $this->addResource(new Kwf_Acl_Resource_MenuUrl('default_index', array('text'=>trlKwf('Customers'), 'icon'=>'user.png'), '/'));

        $this->addResource(new Kwf_Acl_Resource_MenuUrl('default_links', array('text'=>trlKwf('General'), 'icon'=>'book.png'), '/links'), 'default_menuitem');
        $this->addResource(new Kwf_Acl_Resource_MenuUrl('default_report', array('text'=>trl('Report'), 'icon'=>'user.png'), '/report'));
 
        $this->addResource(new Kwf_Acl_Resource_MenuUrl('default_tasks', array('text'=>trl('Tasks'), 'icon'=>'time.png'), '/tasks'));

        $this->addResource(new Kwf_Acl_Resource_MenuUrl('default_langclubs', array('text'=>trl('Lang clubs'), 'icon'=>'time.png'), '/langclubs'));

        $this->addResource(new Zend_Acl_Resource('default_members'), 'default_index');
        $this->addResource(new Zend_Acl_Resource('default_member'), 'default_members');
        $this->addResource(new Zend_Acl_Resource('default_member-contacts'), 'default_members');
        $this->addResource(new Zend_Acl_Resource('default_member-contact'), 'default_member-contacts');
                
        $this->addResource(new Zend_Acl_Resource('default_link'), 'default_links');
        $this->addResource(new Zend_Acl_Resource('default_link-data'), 'default_links');
        $this->addResource(new Zend_Acl_Resource('default_link-dataentry'), 'default_link-data');
        
        $this->addResource(new Zend_Acl_Resource('default_task'), 'default_tasks');
        $this->addResource(new Zend_Acl_Resource('default_langclub'), 'default_langclubs');
        $this->addResource(new Zend_Acl_Resource('default_langclubgroups'), 'default_langclubs');
        $this->addResource(new Zend_Acl_Resource('default_langclubgroup'), 'default_langclubgroups');
        $this->addResource(new Zend_Acl_Resource('default_langclubgroupsfilter'), 'default_langclubgroup');

        $this->add(new Kwf_Acl_Resource_MenuUrl('kwf_user_users',
                                                array('text'=>trlKwf('Users management'), 'icon'=>'user.png'),
                                                '/kwf/user/users'));
        $this->add(new Zend_Acl_Resource('kwf_user_user'), 'kwf_user_users');
        $this->add(new Zend_Acl_Resource('kwf_user_log'), 'kwf_user_users');
        $this->add(new Zend_Acl_Resource('kwf_user_comments'), 'kwf_user_users');

        $this->addRole(new Zend_Acl_Role('user'));
        $this->allow('user', 'default_tasks');

        $this->allow('admin', 'default_report');
        $this->allow('admin', 'default_tasks');
        $this->allow('admin', 'default_langclubgroupsfilter');
        $this->allow('admin', 'default_langclubgroups');
        $this->allow('admin', 'default_langclubs');
        $this->allow('admin', 'default_menuitem');
        $this->allow('admin', 'kwf_user_users');        
        $this->allow('admin', 'default_links');
        $this->allow('admin', 'default_index');
        $this->allow('admin', 'kwf_media_upload');
        $this->allow('guest', 'kwf_media_upload');

    }
}