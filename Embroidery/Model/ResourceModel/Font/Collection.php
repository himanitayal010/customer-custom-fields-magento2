<?php
namespace Magneto\Embroidery\Model\ResourceModel\Font;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection 
{
    protected function _construct()
    {
        $this->_init('Magneto\Embroidery\Model\Font','Magneto\Embroidery\Model\ResourceModel\Font');
    }
}