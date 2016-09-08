<?php

class Lokman_AsiaPay_Block_Adminhtml_Asiapay_Grid extends Mage_Adminhtml_Block_Widget_Grid
{

		public function __construct()
		{
				parent::__construct();
				$this->setId("id");
				$this->setDefaultSort("created_at");
				$this->setDefaultDir("DESC");
				$this->setSaveParametersInSession(true);
		}

		protected function _prepareCollection()
		{
              $collection = Mage::getModel("asiapay/asiapay")->getCollection();
//            $collection = Mage::getModel("sales/order")->getCollection();
//            $collection->addFieldToSelect(array('increment_id','payref'));
//            $collection->getSelect()->joinLeft('asiapay_ref', "main_table.payref = asiapay_ref.Ref",
//                array('id','Ref','ord','successcode','Amt','Cur','Holder','AuthId',
//                    'eci','payerAuth','sourceIp','ipCountry','payMethod','cardIssuingCountry','channelType','prc','src'
//                    ,'AlertCode','remark','created_at'))->where("asiapay_ref.Ref is not null");

            $this->setCollection($collection);

            return parent::_prepareCollection();
		}
		protected function _prepareColumns()
		{

				$this->addColumn("id", array(
				"header" => Mage::helper("asiapay")->__("ID"),
				"align" =>"right",
				"width" => "50px",
			    "type" => "number",
				"index" => "id",
				));
                $this->addColumn("increment_id", array(
                    "header" => Mage::helper("asiapay")->__("Order ID #"),
                    "index" => "increment_id",
                    "renderer" =>  'Lokman_AsiaPay_Block_Adminhtml_Asiapay_Renderer_Order'
                ));
                $this->addColumn("Ref", array(
                "header" => Mage::helper("asiapay")->__("Ref"),
                "index" => "Ref",
                ));
                $this->addColumn("ord", array(
				"header" => Mage::helper("asiapay")->__("Ord"),
				"index" => "Ord",
				));
				$this->addColumn("successcode", array(
				"header" => Mage::helper("asiapay")->__("successcode"),
				"index" => "successcode",
				));
				$this->addColumn("amt", array(
				"header" => Mage::helper("asiapay")->__("Amt"),
				"index" => "Amt",
				));
				$this->addColumn("cur", array(
				"header" => Mage::helper("asiapay")->__("Cur"),
				"index" => "Cur",
				));
				$this->addColumn("holder", array(
				"header" => Mage::helper("asiapay")->__("Holder"),
				"index" => "Holder",
				));
				$this->addColumn("authid", array(
				"header" => Mage::helper("asiapay")->__("AuthId"),
				"index" => "AuthId",
				));
				$this->addColumn("alertcode", array(
				"header" => Mage::helper("asiapay")->__("AlertCode"),
				"index" => "AlertCode",
				));
				$this->addColumn("remark", array(
				"header" => Mage::helper("asiapay")->__("remark"),
				"index" => "remark",
				));
				$this->addColumn("eci", array(
				"header" => Mage::helper("asiapay")->__("eci"),
				"index" => "eci",
				));
				$this->addColumn("payerauth", array(
				"header" => Mage::helper("asiapay")->__("payerAuth"),
				"index" => "payerAuth",
				));
				$this->addColumn("sourceip", array(
				"header" => Mage::helper("asiapay")->__("sourceIp"),
				"index" => "sourceIp",
				));
				$this->addColumn("ipcountry", array(
				"header" => Mage::helper("asiapay")->__("ipCountry"),
				"index" => "ipCountry",
				));
				$this->addColumn("paymethod", array(
				"header" => Mage::helper("asiapay")->__("payMethod"),
				"index" => "payMethod",
				));
				$this->addColumn("cardissuingcountry", array(
				"header" => Mage::helper("asiapay")->__("cardIssuingCountry"),
				"index" => "cardIssuingCountry",
				));
				$this->addColumn("channeltype", array(
				"header" => Mage::helper("asiapay")->__("channelType"),
				"index" => "channelType",
				));
				$this->addColumn("prc", array(
				"header" => Mage::helper("asiapay")->__("prc"),
				"index" => "prc",
				));
				$this->addColumn("src", array(
				"header" => Mage::helper("asiapay")->__("src"),
				"index" => "src",
				));
            $this->addColumn("src", array(
                "header" => Mage::helper("asiapay")->__("src"),
                "index" => "src",
            ));
			$this->addExportType('*/*/exportCsv', Mage::helper('sales')->__('CSV')); 
			$this->addExportType('*/*/exportExcel', Mage::helper('sales')->__('Excel'));

				return parent::_prepareColumns();
		}

		public function getRowUrl($row)
		{


		}


		
		protected function _prepareMassaction()
		{
			$this->setMassactionIdField('Ref');
			$this->getMassactionBlock()->setFormFieldName('refs');
			$this->getMassactionBlock()->setUseSelectAll(true);
			$this->getMassactionBlock()->addItem('remove_asiapay', array(
					 'label'=> Mage::helper('asiapay')->__('Remove Asiapay'),
					 'url'  => $this->getUrl('*/adminhtml_asiapay/massRemove'),
					 'confirm' => Mage::helper('asiapay')->__('Are you sure?')
				));
			return $this;
		}
			

}