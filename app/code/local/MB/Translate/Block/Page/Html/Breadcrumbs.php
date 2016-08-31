<?php

class MB_Translate_Block_Page_Html_Breadcrumbs extends Mage_Page_Block_Html_Breadcrumbs
{
    public function __construct()
    {
        parent::__construct();
    }

    public function addCrumb($crumbName, $crumbInfo, $after = false)
    {
        $module = Mage::helper('mb_translate')->getTranslateModule();
        if (isset($crumbInfo['label'])) $crumbInfo['label'] = $module->__($crumbInfo['label']);
        if (isset($crumbInfo['title'])) $crumbInfo['title'] = $module->__($crumbInfo['title']);
        return parent::addCrumb($crumbName, $crumbInfo, $after);
    }
}
