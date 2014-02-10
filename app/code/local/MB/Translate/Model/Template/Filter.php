<?php

class MB_Translate_Model_Template_Filter extends Mage_Widget_Model_Template_Filter
{
    const XML_DEFAULT_MODULE_PATH = 'cms/translate/default_module';
    const DEFAULT_MODULE          = 'page';
    protected $_defaultModule     = null;
    public function translateDirective($construction)
    {
        $params = $this->_getIncludeParameters($construction[2]);
        $text = $params['text'];
        $module = (!empty($params['module'])) ? $this->_getTranslateModuleName($params['module']) : $this->_getDefaultModule();
        return Mage::helper($module)->__($text);
    }
    protected function _getTranslateModuleName($module)
    {
        try
        {
            $helper = Mage::helper($module);
            return $module;
        }
        catch (Exception $e)
        {
            return $this->_getDefaultModule();
        }
    }
    protected function _getDefaultModule()
    {
        if (is_null($this->_defaultModule))
        {
            $moduleName = Mage::getStoreConfig(self::XML_DEFAULT_MODULE_PATH);
            if (empty($moduleName))
            {
                $this->_defaultModule = self::DEFAULT_MODULE;
            }
            else
            {
                try
                {
                    $helper = Mage::helper($moduleName);
                    $this->_defaultModule = $moduleName;
                }
                catch (Exception $e)
                {
                    $this->_defaultModule = self::DEFAULT_MODULE;
                }
            }
        }
        return $this->_defaultModule;
    }
}
