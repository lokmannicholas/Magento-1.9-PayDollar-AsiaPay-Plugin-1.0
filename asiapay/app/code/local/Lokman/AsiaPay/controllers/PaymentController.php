<?php
Class Lokman_AsiaPay_PaymentController extends Mage_Core_Controller_Front_Action{

    public function indexAction(){

        $quoteId=Mage::getModel('checkout/cart')->getQuote()->getId();
        $quote=Mage::getModel('sales/quote')->loadByIdWithoutStore($quoteId);
        $amount=$quote->getGrandTotal()-$quote->getBonusValue();

        $now = new DateTime();
        $webBase  = Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_WEB);
        if(Mage::getStoreConfig('payment/asiapay/test')){
            $redirectUrl=Mage::getStoreConfig('payment/asiapay/uaturl');
        }else{
            $redirectUrl=Mage::getStoreConfig('payment/asiapay/apiurl');
        }

        $param=array();
        $param['lang']=Mage::getStoreConfig('payment/asiapay/languages');
        $param['orderRef']=Mage::getStoreConfig('payment/asiapay/prefix').$now->getTimestamp().rand(1,1000).Mage::getStoreConfig('payment/asiapay/surfix');
        $param['currCode']=Mage::getStoreConfig('payment/asiapay/currency');
        $param['amount']=$amount;
        $param['cancelUrl']=$webBase.Mage::getStoreConfig('payment/asiapay/multishippingcancelurl');
        $param['failUrl']=$webBase.Mage::getStoreConfig('payment/asiapay/multishippingfailedurl');
        $param['successUrl']=$webBase.Mage::getStoreConfig('payment/asiapay/multishippingsuccessurl');
        $param['merchantId']=Mage::getStoreConfig('payment/asiapay/merchantid');
        $param['payType']=Mage::getStoreConfig('payment/asiapay/paymenttype');
        $param['payMethod']=Mage::getStoreConfig('payment/asiapay/paymentmethod');

        foreach($param as $key => $value){
            $redirectUrl.=$key."=".$value."&";
        }

        $this->_redirectUrl($redirectUrl);

    }


}