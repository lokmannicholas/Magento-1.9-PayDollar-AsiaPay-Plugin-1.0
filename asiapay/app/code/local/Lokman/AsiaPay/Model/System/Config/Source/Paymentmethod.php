<?php
class Lokman_AsiaPay_Model_System_Config_Source_Paymentmethod
{

    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
        return array(
		
            array('value' => 'CC', 'label'=>Mage::helper('adminhtml')->__('Credit Card')),

        );
    }

}
