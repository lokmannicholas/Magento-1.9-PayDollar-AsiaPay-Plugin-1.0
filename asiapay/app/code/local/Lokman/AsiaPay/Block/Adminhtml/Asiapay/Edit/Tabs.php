<?php
class Lokman_AsiaPay_Block_Adminhtml_Asiapay_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{
		public function __construct()
		{
				parent::__construct();
				$this->setId("asiapay_tabs");
				$this->setDestElementId("edit_form");
				$this->setTitle(Mage::helper("asiapay")->__("Item Information"));
		}
		protected function _beforeToHtml()
		{
				$this->addTab("form_section", array(
				"label" => Mage::helper("asiapay")->__("Item Information"),
				"title" => Mage::helper("asiapay")->__("Item Information"),
				"content" => $this->getLayout()->createBlock("asiapay/adminhtml_asiapay_edit_tab_form")->toHtml(),
				));
				return parent::_beforeToHtml();
		}

}
