<?php

class MB_Translate_Model_Template_Filter extends Mage_Widget_Model_Template_Filter
{
    public function translateDirective($construction)
    {
        $params = $this->_getIncludeParameters($construction[2]);
        $text = $params['text'];
        return Mage::helper('page')->__($text);
    }
}
