<?php
class ReportController extends Kwf_Controller_Action
{
    public function indexAction()
    {
        $this->view->xtype = 'report';
    }

    public function jsonGetReportAction()
    {
        $this->view->html = 'foo: '.$this->_getParam('foo');
    }
}
