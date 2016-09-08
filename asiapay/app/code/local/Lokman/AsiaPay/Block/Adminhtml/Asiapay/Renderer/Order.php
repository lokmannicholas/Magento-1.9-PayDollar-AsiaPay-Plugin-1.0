<?php
/**
 * Created by PhpStorm.
 * User: lokmannicholas
 * Date: 11/3/16
 * Time: 4:51 PM
 */

class Lokman_AsiaPay_Block_Adminhtml_Asiapay_Renderer_Order extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{

    public function render(Varien_Object $row)
    {
        $Ref =  $row->getData('Ref');
        $order=Mage::getModel("sales/order")->loadByAttribute('payref', $Ref);
        //$url=Mage::getBaseUrl()."admin/sales_order/view";
        $urlModel = Mage::getModel('core/url');
        $url = $urlModel->getUrl('adminhtml/sales_order/view', array(
            '_current' => false,
            'order_id' => $order->getId()
        ));
        return '<a href="'.$url.'"> <span style="color:red;">'.$order->getIncrementId().'</span></a>';

    }

}
?>