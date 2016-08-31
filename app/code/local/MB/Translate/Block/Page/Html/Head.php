<?php

class MB_Translate_Block_Page_Html_Head extends Mage_Page_Block_Html_Head
{
    protected $shouldTranslate;

    public function __construct()
    {
        parent::__construct();
    }

    public function setTranslate(bool $shouldTranslate = true)
    {
        $this->shouldTranslate = $shouldTranslate;
        return $this;
    }

    public function getTitle()
    {
        $title = parent::getTitle();
        if ($this->shouldTranslate) return Mage::helper('mb_translate')->getTranslateModule()->__($title);
        return $title;
    }

    public function getDescription()
    {
        $description = parent::getDescription();
        if ($this->shouldTranslate) return Mage::helper('mb_translate')->getTranslateModule()->__($description);
        return $description;
    }

    public function getKeywords()
    {
        $keywords = parent::getKeywords();
        if ($this->shouldTranslate) return Mage::helper('mb_translate')->getTranslateModule()->__($keywords);
        return $keywords;
    }
}
