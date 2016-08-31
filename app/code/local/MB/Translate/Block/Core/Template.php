<?php

class MB_Translate_Block_Core_Template extends Mage_Core_Block_Template
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getContentHeading()
    {
        return $this->__(parent::getContentHeading());
    }
}
