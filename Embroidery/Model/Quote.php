<?php
namespace Magneto\Embroidery\Model;

class Quote extends \Magento\Framework\Model\AbstractModel
{
    public function _construct()
    {
        $this->_init('Magneto\Embroidery\Model\ResourceModel\Quote');
    }
}