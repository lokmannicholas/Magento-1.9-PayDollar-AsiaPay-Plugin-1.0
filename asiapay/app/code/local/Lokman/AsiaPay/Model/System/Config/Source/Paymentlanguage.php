<?php
class Lokman_AsiaPay_Model_System_Config_Source_Paymentlanguage
{

    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
        return array(
		
            array('value' => 'E', 'label'=>Mage::helper('adminhtml')->__('English')),
            array('value' => 'C', 'label'=>Mage::helper('adminhtml')->__('Chinese')),
        );
    }

}
