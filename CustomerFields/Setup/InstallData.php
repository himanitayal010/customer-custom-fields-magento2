<?php 
namespace Magneto\CustomerFields\Setup;

use Magento\Customer\Model\Customer;
use Magento\Customer\Setup\CustomerSetup;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{
    /**
     * Customer setup factory
     *
     * @var \Magento\Customer\Setup\CustomerSetupFactory
     */
    private $customerSetupFactory;

    /**
     * Init
     *
     * @param \Magento\Customer\Setup\CustomerSetupFactory $customerSetupFactory
     */
    public function __construct(\Magento\Customer\Setup\CustomerSetupFactory $customerSetupFactory)
    {
        $this->customerSetupFactory = $customerSetupFactory;
    }
    /**
     * Installs DB schema for a module
     *
     * @param ModuleDataSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     */
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();

        $customerSetup = $this->customerSetupFactory->create(['setup' => $setup]);
        $entityTypeId = $customerSetup->getEntityTypeId(Customer::ENTITY);

        // Mobile Number
        $customerSetup->removeAttribute(Customer::ENTITY, "mobile_number");
        $customerSetup->removeAttribute(Customer::ENTITY, "loyalty_check");

        $customerSetup->addAttribute(Customer::ENTITY, "mobile_number",  array(
            "type"      => "varchar",
            "backend"   => "",
            "label"     => "Mobile Number",
            "input"     => "text",
            "source"    => "",
            "visible"   => true,
            "required"  => false,
            "default"   => "",
            "frontend"  => "",
            "unique"    => false,
            "note"      => ""
        ));
        $customerSetup->addAttribute(Customer::ENTITY, "loyalty_check",  array(
            "type"      => "text",
            "backend"   => "",
            "label"     => "Loyalty Check",
            "input"     => "text",
            "source"    => "",
            "visible"   => true,
            "required"  => false,
            "default"   => "",
            "frontend"  => "",
            "unique"    => false,
            "note"      => ""
        ));

        $mobile_number   = $customerSetup->getAttribute(Customer::ENTITY, "mobile_number");
        $mobile_number = $customerSetup->getEavConfig()->getAttribute(Customer::ENTITY, 'mobile_number');

        $used_in_forms[]="adminhtml_customer";
        $used_in_forms[]="customer_account_create";
        $used_in_forms[]="customer_account_edit";

        $mobile_number->setData("used_in_forms", $used_in_forms)
            ->setData("is_used_for_customer_segment", true)
            ->setData("is_system", 0)
            ->setData("is_user_defined", 1)
            ->setData("is_visible", 1)
            ->setData("sort_order", 0);

        $mobile_number->save();

        $loyalty_check   = $customerSetup->getAttribute(Customer::ENTITY, "loyalty_check");
        $loyalty_check = $customerSetup->getEavConfig()->getAttribute(Customer::ENTITY, 'loyalty_check');

        $loyalty_check->setData("used_in_forms", $used_in_forms)
            ->setData("is_used_for_customer_segment", true)
            ->setData("is_system", 0)
            ->setData("is_user_defined", 1)
            ->setData("is_visible", 1)
            ->setData("sort_order", 0);

        $loyalty_check->save();
        $installer->endSetup();
    }
}