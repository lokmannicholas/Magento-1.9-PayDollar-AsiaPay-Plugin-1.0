<?php
class Lokman_AsiaPay_Model_System_Config_Source_Paymentcurrency
{

    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
        return array(
		
            array('value' => '344', 'label'=>Mage::helper('adminhtml')->__('HKD')),

        );
    }

}
