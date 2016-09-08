<?php
require_once Mage::getModuleDir ( 'controllers', 'Mage_Checkout' ) . DS . 'MultishippingController.php';
class Lokman_AsiaPay_Checkout_MultishippingController extends Mage_Checkout_MultishippingController
{
    public function overviewPostAction(){
        if (!$this->_validateFormKey()) {
            $this->_forward('backToAddresses');
            return;
        }

        if (!$this->_validateMinimumAmount()) {
            return;
        }
        try {
            if ($requiredAgreements = Mage::helper('checkout')->getRequiredAgreementIds()) {
                $postedAgreements = array_keys($this->getRequest()->getPost('agreement', array()));
                if ($diff = array_diff($requiredAgreements, $postedAgreements)) {
                    $this->_getCheckoutSession()->addError($this->__('Please agree to all Terms and Conditions before placing the order.'));
                    $this->_redirect('*/*/billing');
                    return;
                }
            }

            if(isset($payment['method'])&& $payment['method']=="asiapay") {
                $this->_redirect("asiapay/payment");
            }else{
                return parent::overviewPostAction();
            }

        } catch (Mage_Payment_Model_Info_Exception $e) {
            $message = $e->getMessage();
            if ( !empty($message) ) {
                $this->_getCheckoutSession()->addError($message);
            }
            $this->_redirect('*/*/billing');
        } catch (Mage_Checkout_Exception $e) {
            Mage::helper('checkout')
                ->sendPaymentFailedEmail($this->_getCheckout()->getQuote(), $e->getMessage(), 'multi-shipping');
            $this->_getCheckout()->getCheckoutSession()->clear();
            $this->_getCheckoutSession()->addError($e->getMessage());
            $this->_redirect('*/cart');
        }
        catch (Mage_Core_Exception $e) {
            Mage::log("Mage_Checkout_MultishippingController:overviewPostAction ".json_encode($e->getMessage()),null,"Debug.log",true);
            Mage::helper('checkout')
                ->sendPaymentFailedEmail($this->_getCheckout()->getQuote(), $e->getMessage(), 'multi-shipping');
            $this->_getCheckoutSession()->addError($e->getMessage());
            $this->_redirect('*/*/billing');
        } catch (Exception $e) {
            Mage::logException($e);
            Mage::helper('checkout')
                ->sendPaymentFailedEmail($this->_getCheckout()->getQuote(), $e->getMessage(), 'multi-shipping');
            $this->_getCheckoutSession()->addError($this->__('Order place error.'));
            $this->_redirect('*/*/billing');
        }

    }

    public function saveOrderAction()
    {

        try {
            $this->_getCheckout()->createOrders();

            //update asiapay ref
            $Ref=$this->getRequest()->getParam('Ref');
            if($Ref){
                $ids = $this->_getCheckout()->getOrderIds();
                foreach($ids as $id){
                    $order=Mage::getModel('sales/order')->load($id);
                    $order->setPayref($Ref);
                    $order->save();
                }
            }

            $this->_getState()->setActiveStep(
                Mage_Checkout_Model_Type_Multishipping_State::STEP_SUCCESS
            );

            $this->_getState()->setCompleteStep(
                Mage_Checkout_Model_Type_Multishipping_State::STEP_OVERVIEW
            );

            $this->_getCheckout()->getCheckoutSession()->clear();
            $this->_getCheckout()->getCheckoutSession()->setDisplaySuccess(true);
            $this->_redirect('*/*/success');


        } catch (Mage_Payment_Model_Info_Exception $e) {
            $message = $e->getMessage();
            if ( !empty($message) ) {
                $this->_getCheckoutSession()->addError($message);
            }
            $this->_redirect('*/*/billing');
        } catch (Mage_Checkout_Exception $e) {
            Mage::helper('checkout')
                ->sendPaymentFailedEmail($this->_getCheckout()->getQuote(), $e->getMessage(), 'multi-shipping');
            $this->_getCheckout()->getCheckoutSession()->clear();
            $this->_getCheckoutSession()->addError($e->getMessage());
            $this->_redirect('*/cart');
        }
        catch (Mage_Core_Exception $e) {
             Mage::helper('checkout')
                ->sendPaymentFailedEmail($this->_getCheckout()->getQuote(), $e->getMessage(), 'multi-shipping');
            $this->_getCheckoutSession()->addError($e->getMessage());
            $this->_redirect('*/*/billing');
        } catch (Exception $e) {
            Mage::logException($e);
            Mage::helper('checkout')
                ->sendPaymentFailedEmail($this->_getCheckout()->getQuote(), $e->getMessage(), 'multi-shipping');
            $this->_getCheckoutSession()->addError($this->__('Order place error.'));
            $this->_redirect('*/*/billing');
        }
    }


}
