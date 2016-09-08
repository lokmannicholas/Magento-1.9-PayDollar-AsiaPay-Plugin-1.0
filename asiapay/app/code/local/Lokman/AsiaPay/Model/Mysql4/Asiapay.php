<?php
class Lokman_AsiaPay_Model_Mysql4_Asiapay extends Mage_Core_Model_Mysql4_Abstract
{
    protected function _construct()
    {
        $this->_init("asiapay/asiapay", "id");
    }
}