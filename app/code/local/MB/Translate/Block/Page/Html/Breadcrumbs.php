<?php

class MB_Translate_Block_Page_Html_Breadcrumbs extends Mage_Page_Block_Html_Breadcrumbs
{
    public function __construct()
    {
        parent::__construct();
    }

    public function addCrumb($crumbName, $crumbInfo, $after = false)
    {
        // This solution might try to translate some values twice since
        // everything that comes in will be translated.
        if (isset($crumbInfo['label'])) $crumbInfo['label'] = $this->__($crumbInfo['label']);
        if (isset($crumbInfo['title'])) $crumbInfo['title'] = $this->__($crumbInfo['title']);
        return parent::addCrumb($crumbName, $crumbInfo, $after);
    }
}
