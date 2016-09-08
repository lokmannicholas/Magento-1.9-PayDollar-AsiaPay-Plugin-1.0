<?php
class Lokman_AsiaPay_Model_System_Config_Source_Paymentoption
{

    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
        return array(
		
            array('value' => 'N', 'label'=>Mage::helper('adminhtml')->__('N')),
            array('value' => 'H', 'label'=>Mage::helper('adminhtml')->__('H')),
        );
    }

}
