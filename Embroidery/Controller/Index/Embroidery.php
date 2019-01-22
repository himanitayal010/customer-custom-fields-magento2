<?php
namespace Magneto\Embroidery\Controller\Index;

use Magento\Framework\Controller\ResultFactory;

class Embroidery extends \Magento\Framework\App\Action\Action
{
	protected $resultFactory;

	protected $checkoutSession;

	protected $jsonHelper;

	public function __construct(
		\Magento\Framework\App\Action\Context $context,
		ResultFactory $resultFactory,
		\Magento\Checkout\Model\Session $checkoutSession,
		\Magento\Framework\Json\Helper\Data $jsonHelper,
		array $data = []
		)
	{
		$this->resultFactory = $resultFactory;
		$this->_checkoutSession = $checkoutSession;
		$this->jsonHelper = $jsonHelper;
		return parent::__construct($context);
	}

	public function execute()
	{
		// Name Embroidery

			// if($this->getRequest()->getParam('font') || $this->getRequest()->getParam('font2') || $this->getRequest()->getParam('font3') || $this->getRequest()->getParam('logo') || $this->getRequest()->getParam('logo2')){
				//Add Data In Session
				$embroidery_data = array();
				$i = 0;
				// Name Design
				if($this->getRequest()->getParam('font')){
					$embroidery_data[$i]['line'] = 'line 1';
	                $embroidery_data[$i]['font'] = $this->getRequest()->getParam('font');
	                $embroidery_data[$i]['color'] = $this->getRequest()->getParam('color_value');
	                $embroidery_data[$i]['placement'] = $this->getRequest()->getParam('placement_value');
	                $embroidery_data[$i]['name_text'] = $this->getRequest()->getParam('input_valsname');
	                $embroidery_data[$i]['comment'] = $this->getRequest()->getParam('textatra_value_comment');
	                $i++;
				}

                if($this->getRequest()->getParam('font2')){
                    // Line 2
                    $embroidery_data[$i]['line'] = 'line 2';
                    $embroidery_data[$i]['font'] = $this->getRequest()->getParam('font2');
                    $embroidery_data[$i]['color'] = $this->getRequest()->getParam('color_value2');
                    $embroidery_data[$i]['placement'] = $this->getRequest()->getParam('placement_value2');
                    $embroidery_data[$i]['name_text'] = $this->getRequest()->getParam('input_valsname2');
                    $embroidery_data[$i]['comment'] = $this->getRequest()->getParam('textatra_value_comment2');
                    $i++;
                }

                if($this->getRequest()->getParam('font3'))){
                    // Line 3
                    $embroidery_data[$i]['line'] = 'line 3';
                    $embroidery_data[$i]['font'] = $this->getRequest()->getParam('font3');
                    $embroidery_data[$i]['color'] = $this->getRequest()->getParam('color_value3');
                    $embroidery_data[$i]['placement'] = $this->getRequest()->getParam('placement_value3');
                    $embroidery_data[$i]['name_text'] = $this->getRequest()->getParam('input_valsname3');
                    $embroidery_data[$i]['comment'] = $this->getRequest()->getParam('textatra_value_comment3');
                    $i+;
                }

                // Stock Design
                if($this->getRequest()->getParam('logo')) {
                	$embroidery_data[$i]['logo'] = $this->getRequest()->getParam('logo');
                	$embroidery_data[$i]['stock_value'] = $this->getRequest()->getParam('stock_value');
                	$embroidery_data[$i]['stockplacement_value'] = $this->getRequest()->getParam('stockplacement_value');
                	$embroidery_data[$i]['position_value'] = $this->getRequest()->getParam('position_value');
                	$i++;
                }
                if($this->getRequest()->getParam('logo2')) {
                	$embroidery_data[$i]['logo'] = $this->getRequest()->getParam('logo2');
                	$embroidery_data[$i]['stock_value'] = $this->getRequest()->getParam('stock_value2');
                	$embroidery_data[$i]['stockplacement_value'] = $this->getRequest()->getParam('stockplacement_value2');
                	$embroidery_data[$i]['position_value'] = $this->getRequest()->getParam('position_value2');
                	$i++;
                }
                
                $encoded_embroidery_data = $this->jsonHelper->jsonEncode($embroidery_data);
                $this->_checkoutSession->setEmbroideryData($encoded_embroidery_data)
			// }	        


		$resultJson = $this->resultFactory->create(ResultFactory::TYPE_JSON);
        return $resultJson;
	}
}