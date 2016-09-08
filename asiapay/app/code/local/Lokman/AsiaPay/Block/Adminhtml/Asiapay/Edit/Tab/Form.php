<?php
class Lokman_AsiaPay_Block_Adminhtml_Asiapay_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
		protected function _prepareForm()
		{

				$form = new Varien_Data_Form();
				$this->setForm($form);
				$fieldset = $form->addFieldset("asiapay_form", array("legend"=>Mage::helper("asiapay")->__("Item information")));

				
						$fieldset->addField("Ref", "text", array(
						"label" => Mage::helper("asiapay")->__("Ref"),
						"name" => "ref",
						));
					
						$fieldset->addField("Ord", "text", array(
						"label" => Mage::helper("asiapay")->__("Ord"),
						"name" => "ord",
						));
					
						$fieldset->addField("PayRef", "text", array(
						"label" => Mage::helper("asiapay")->__("PayRef"),
						"name" => "payref",
						));
					
						$fieldset->addField("successcode", "text", array(
						"label" => Mage::helper("asiapay")->__("successcode"),
						"name" => "successcode",
						));
					
						$fieldset->addField("Amt", "text", array(
						"label" => Mage::helper("asiapay")->__("Amt"),
						"name" => "amt",
						));
					
						$fieldset->addField("Cur", "text", array(
						"label" => Mage::helper("asiapay")->__("Cur"),
						"name" => "cur",
						));
					
						$fieldset->addField("Holder", "text", array(
						"label" => Mage::helper("asiapay")->__("Holder"),
						"name" => "holder",
						));
					
						$fieldset->addField("AuthId", "text", array(
						"label" => Mage::helper("asiapay")->__("AuthId"),
						"name" => "authid",
						));
					
						$fieldset->addField("AlertCode", "text", array(
						"label" => Mage::helper("asiapay")->__("AlertCode"),
						"name" => "alertcode",
						));
					
						$fieldset->addField("remark", "text", array(
						"label" => Mage::helper("asiapay")->__("remark"),
						"name" => "remark",
						));
					
						$fieldset->addField("eci", "text", array(
						"label" => Mage::helper("asiapay")->__("eci"),
						"name" => "eci",
						));
					
						$fieldset->addField("payerAuth", "text", array(
						"label" => Mage::helper("asiapay")->__("payerAuth"),
						"name" => "payerauth",
						));
					
						$fieldset->addField("sourceIp", "text", array(
						"label" => Mage::helper("asiapay")->__("sourceIp"),
						"name" => "sourceip",
						));
					
						$fieldset->addField("ipCountry", "text", array(
						"label" => Mage::helper("asiapay")->__("ipCountry"),
						"name" => "ipcountry",
						));
					
						$fieldset->addField("payMethod", "text", array(
						"label" => Mage::helper("asiapay")->__("payMethod"),
						"name" => "paymethod",
						));
					
						$fieldset->addField("cardIssuingCountry", "text", array(
						"label" => Mage::helper("asiapay")->__("cardIssuingCountry"),
						"name" => "cardissuingcountry",
						));
					
						$fieldset->addField("channelType", "text", array(
						"label" => Mage::helper("asiapay")->__("channelType"),
						"name" => "channeltype",
						));
					
						$fieldset->addField("prc", "text", array(
						"label" => Mage::helper("asiapay")->__("prc"),
						"name" => "prc",
						));
					
						$fieldset->addField("src", "text", array(
						"label" => Mage::helper("asiapay")->__("src"),
						"name" => "src",
						));
					

				if (Mage::getSingleton("adminhtml/session")->getAsiapayData())
				{
					$form->setValues(Mage::getSingleton("adminhtml/session")->getAsiapayData());
					Mage::getSingleton("adminhtml/session")->setAsiapayData(null);
				} 
				elseif(Mage::registry("asiapay_data")) {
				    $form->setValues(Mage::registry("asiapay_data")->getData());
				}
				return parent::_prepareForm();
		}
}
