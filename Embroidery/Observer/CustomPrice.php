<?php

namespace Magneto\Embroidery\Observer;
 
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\App\RequestInterface;
use Magneto\Embroidery\Helper\Data;
 
class CustomPrice implements ObserverInterface
{
	protected $helper;

	protected $checkoutSession;

	public function __construct(
		\Magento\Framework\App\Action\Context $context, 
		\Magneto\Embroidery\Helper\Data $helper, 
		\Magento\Checkout\Model\Session $checkoutSession) {
        $this->helper = $helper;
        $this->_checkoutSession = $checkoutSession;
    }

	public function execute(\Magento\Framework\Event\Observer $observer) {
        $item = $observer->getEvent()->getData('quote_item');  
        $price = $item->getProduct()->getPrice();
        $item = ( $item->getParentItem() ? $item->getParentItem() : $item );
        if($this->getNameLines() >=1){
        	$newprice = ($this->getNamePrice() * $this->getNameLines()) + $price;
	        $item->setCustomPrice($newprice);
	        $item->setOriginalCustomPrice($newprice);
	        $item->getProduct()->setIsSuperMode(true);
        }        
    }

    public function getNamePrice()
    {
        return $this->helper->getNamePrice();
    }

    public function getNameLines()
    {
        $line = array();
        if($this->_checkoutSession->getLineOne()){
        	$line[] = $this->_checkoutSession->getLineOne();
        }
        if($this->_checkoutSession->getLineTwo()){
        	$line[] = $this->_checkoutSession->getLineTwo();
        }
        if($this->_checkoutSession->getLineThree()){
        	$line[] = $this->_checkoutSession->getLineThree();
        } 
        if($this->_checkoutSession->getLineOne() || $this->_checkoutSession->getLineTwo() || $this->_checkoutSession->getLineThree()) {
        	return count($line);
        }else{
        	return '0';
        }
    }
}