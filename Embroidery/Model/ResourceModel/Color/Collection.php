<?php
namespace Magneto\Embroidery\Model\ResourceModel\Color;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection 
{
    protected function _construct()
    {
        $this->_init('Magneto\Embroidery\Model\Color','Magneto\Embroidery\Model\ResourceModel\Color');
    }
}