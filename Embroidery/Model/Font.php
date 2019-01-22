<?php
namespace Magneto\Embroidery\Model;

class Font extends \Magento\Framework\Model\AbstractModel
{
    public function _construct()
    {
        $this->_init('Magneto\Embroidery\Model\ResourceModel\Font');
    }
}