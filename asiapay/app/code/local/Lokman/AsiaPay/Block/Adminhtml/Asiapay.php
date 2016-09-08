<?php


class Lokman_AsiaPay_Block_Adminhtml_Asiapay extends Mage_Adminhtml_Block_Widget_Grid_Container{

	public function __construct()
	{

	$this->_controller = "adminhtml_asiapay";
	$this->_blockGroup = "asiapay";
	$this->_headerText = Mage::helper("asiapay")->__("Asiapay Manager");
	//$this->_addButtonLabel = Mage::helper("asiapay")->__("Add New Item");
	parent::__construct();
        $this->_removeButton('add');
	}

}