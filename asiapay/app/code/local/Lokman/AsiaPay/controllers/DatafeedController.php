<?php
Class Lokman_AsiaPay_DatafeedController extends Mage_Core_Controller_Front_Action{



    public function indexAction(){

        $data=$this->getRequest()->getParams();
        if($data) {
            $model = Mage::getModel('asiapay/asiapay');
            foreach ($data as $k => $v) {
                if($k=="TxTime"){
                    $v=substr($v, 0, 19);
                }
                $model->setData($k, $v);
            }
            $model->save();
        }
    }

}