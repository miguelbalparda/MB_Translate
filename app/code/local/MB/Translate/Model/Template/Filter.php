<?php

class MB_Translate_Model_Template_Filter extends Mage_Widget_Model_Template_Filter
{
    public function translateDirective($construction)
    {
        $params = $this->_getIncludeParameters($construction[2]);
        return Mage::helper('mb_translate')
            ->getTranslateModule(isset($params['module']) ? $params['module'] : null)
            ->__($params['text'])
        ;
    }
}
