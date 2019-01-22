<?php
namespace Magneto\Embroidery\Model\ResourceModel\Stock;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection 
{
    protected function _construct()
    {
        $this->_init('Magneto\Embroidery\Model\Stock','Magneto\Embroidery\Model\ResourceModel\Stock');
    }
}