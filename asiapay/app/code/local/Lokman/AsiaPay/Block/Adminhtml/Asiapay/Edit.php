<?php
	
class Lokman_AsiaPay_Block_Adminhtml_Asiapay_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
		public function __construct()
		{

				parent::__construct();
				$this->_objectId = "id";
				$this->_blockGroup = "asiapay";
				$this->_controller = "adminhtml_asiapay";
				$this->_updateButton("save", "label", Mage::helper("asiapay")->__("Save Item"));
				$this->_updateButton("delete", "label", Mage::helper("asiapay")->__("Delete Item"));

				$this->_addButton("saveandcontinue", array(
					"label"     => Mage::helper("asiapay")->__("Save And Continue Edit"),
					"onclick"   => "saveAndContinueEdit()",
					"class"     => "save",
				), -100);



				$this->_formScripts[] = "

							function saveAndContinueEdit(){
								editForm.submit($('edit_form').action+'back/edit/');
							}
						";
		}

		public function getHeaderText()
		{
				if( Mage::registry("asiapay_data") && Mage::registry("asiapay_data")->getId() ){

				    return Mage::helper("asiapay")->__("Edit Item '%s'", $this->htmlEscape(Mage::registry("asiapay_data")->getId()));

				} 
				else{

				     return Mage::helper("asiapay")->__("Add Item");

				}
		}
}