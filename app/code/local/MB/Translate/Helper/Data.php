<?php

class MB_Translate_Helper_Data extends Mage_Core_Helper_Abstract
{
    const XML_DEFAULT_MODULE_PATH = 'cms/translate/default_module';
    const DEFAULT_MODULE          = 'page';
    protected $_defaultModule     = null;

    public function getTranslateModule($module = null)
    {
        return Mage::helper($this->getTranslateModuleName($module));
    }

    public function getTranslateModuleName($module = null)
    {
        if (empty($module)) return $this->_getDefaultModule();
        return $this->_getTranslateModuleName($module);
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
