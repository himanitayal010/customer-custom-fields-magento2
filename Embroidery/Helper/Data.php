<?php

namespace Magneto\Embroidery\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\Encryption\EncryptorInterface;

class Data extends AbstractHelper
{
    /**
     * @var EncryptorInterface
     */
    protected $encryptor;

    /**
     * @param Context $context
     * @param EncryptorInterface $encryptor
     */
    public function __construct(
        Context $context,
        EncryptorInterface $encryptor
    )
    {
        parent::__construct($context);
        $this->encryptor = $encryptor;
    }

    /*
     * @return bool
     */
    public function isEnabled($scope = ScopeConfigInterface::SCOPE_TYPE_DEFAULT)
    {
        return $this->scopeConfig->isSetFlag(
            'embroidery/general/enabled',
            $scope
        );
    }

    /*
     * @return string
     */
    public function getNamePrice($scope = ScopeConfigInterface::SCOPE_TYPE_DEFAULT)
    {
        return $this->scopeConfig->getValue(
            'embroidery/general/name_price',
            $scope
        );
    }
}