<?php

class Lokman_AsiaPay_Adminhtml_AsiapayController extends Mage_Adminhtml_Controller_Action
{
		protected function _initAction()
		{
				$this->loadLayout()->_setActiveMenu("asiapay/asiapay")->_addBreadcrumb(Mage::helper("adminhtml")->__("Asiapay Manager"),Mage::helper("adminhtml")->__("Asiapay Manager"));
				return $this;
		}
		public function indexAction() 
		{
			    $this->_title($this->__("AsiaPay"));
			    $this->_title($this->__("Manager Asiapay"));

				$this->_initAction();
				$this->renderLayout();
		}
		public function editAction()
		{			    
			    $this->_title($this->__("AsiaPay"));
				$this->_title($this->__("Asiapay"));
			    $this->_title($this->__("Edit Item"));
				
				$id = $this->getRequest()->getParam("id");
				$model = Mage::getModel("asiapay/asiapay")->load($id);
				if ($model->getId()) {
					Mage::register("asiapay_data", $model);
					$this->loadLayout();
					$this->_setActiveMenu("asiapay/asiapay");
					$this->_addBreadcrumb(Mage::helper("adminhtml")->__("Asiapay Manager"), Mage::helper("adminhtml")->__("Asiapay Manager"));
					$this->_addBreadcrumb(Mage::helper("adminhtml")->__("Asiapay Description"), Mage::helper("adminhtml")->__("Asiapay Description"));
					$this->getLayout()->getBlock("head")->setCanLoadExtJs(true);
					$this->_addContent($this->getLayout()->createBlock("asiapay/adminhtml_asiapay_edit"))->_addLeft($this->getLayout()->createBlock("asiapay/adminhtml_asiapay_edit_tabs"));
					$this->renderLayout();
				} 
				else {
					Mage::getSingleton("adminhtml/session")->addError(Mage::helper("asiapay")->__("Item does not exist."));
					$this->_redirect("*/*/");
				}
		}

		public function newAction()
		{

		$this->_title($this->__("AsiaPay"));
		$this->_title($this->__("Asiapay"));
		$this->_title($this->__("New Item"));

        $id   = $this->getRequest()->getParam("id");
		$model  = Mage::getModel("asiapay/asiapay")->load($id);

		$data = Mage::getSingleton("adminhtml/session")->getFormData(true);
		if (!empty($data)) {
			$model->setData($data);
		}

		Mage::register("asiapay_data", $model);

		$this->loadLayout();
		$this->_setActiveMenu("asiapay/asiapay");

		$this->getLayout()->getBlock("head")->setCanLoadExtJs(true);

		$this->_addBreadcrumb(Mage::helper("adminhtml")->__("Asiapay Manager"), Mage::helper("adminhtml")->__("Asiapay Manager"));
		$this->_addBreadcrumb(Mage::helper("adminhtml")->__("Asiapay Description"), Mage::helper("adminhtml")->__("Asiapay Description"));


		$this->_addContent($this->getLayout()->createBlock("asiapay/adminhtml_asiapay_edit"))->_addLeft($this->getLayout()->createBlock("asiapay/adminhtml_asiapay_edit_tabs"));

		$this->renderLayout();

		}
		public function saveAction()
		{

			$post_data=$this->getRequest()->getPost();


				if ($post_data) {

					try {

						

						$model = Mage::getModel("asiapay/asiapay")
						->addData($post_data)
						->setId($this->getRequest()->getParam("id"))
						->save();

						Mage::getSingleton("adminhtml/session")->addSuccess(Mage::helper("adminhtml")->__("Asiapay was successfully saved"));
						Mage::getSingleton("adminhtml/session")->setAsiapayData(false);

						if ($this->getRequest()->getParam("back")) {
							$this->_redirect("*/*/edit", array("id" => $model->getId()));
							return;
						}
						$this->_redirect("*/*/");
						return;
					} 
					catch (Exception $e) {
						Mage::getSingleton("adminhtml/session")->addError($e->getMessage());
						Mage::getSingleton("adminhtml/session")->setAsiapayData($this->getRequest()->getPost());
						$this->_redirect("*/*/edit", array("id" => $this->getRequest()->getParam("id")));
					return;
					}

				}
				$this->_redirect("*/*/");
		}



		public function deleteAction()
		{
				if( $this->getRequest()->getParam("id") > 0 ) {
					try {
						$model = Mage::getModel("asiapay/asiapay");
						$model->setId($this->getRequest()->getParam("id"))->delete();
						Mage::getSingleton("adminhtml/session")->addSuccess(Mage::helper("adminhtml")->__("Item was successfully deleted"));
						$this->_redirect("*/*/");
					} 
					catch (Exception $e) {
						Mage::getSingleton("adminhtml/session")->addError($e->getMessage());
						$this->_redirect("*/*/edit", array("id" => $this->getRequest()->getParam("id")));
					}
				}
				$this->_redirect("*/*/");
		}

		
		public function massRemoveAction()
		{
			try {
				$ids = $this->getRequest()->getPost('refs', array());
				foreach ($ids as $id) {
                      $model = Mage::getModel("asiapay/asiapay");
					  $model->setId($id)->delete();
				}
				Mage::getSingleton("adminhtml/session")->addSuccess(Mage::helper("adminhtml")->__("Item(s) was successfully removed"));
			}
			catch (Exception $e) {
				Mage::getSingleton("adminhtml/session")->addError($e->getMessage());
			}
			$this->_redirect('*/*/');
		}
			
		/**
		 * Export order grid to CSV format
		 */
		public function exportCsvAction()
		{
			$fileName   = 'asiapay.csv';
			$grid       = $this->getLayout()->createBlock('asiapay/adminhtml_asiapay_grid');
			$this->_prepareDownloadResponse($fileName, $grid->getCsvFile());
		} 
		/**
		 *  Export order grid to Excel XML format
		 */
		public function exportExcelAction()
		{
			$fileName   = 'asiapay.xml';
			$grid       = $this->getLayout()->createBlock('asiapay/adminhtml_asiapay_grid');
			$this->_prepareDownloadResponse($fileName, $grid->getExcelFile($fileName));
		}
}
