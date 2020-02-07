<?php


namespace Suman\PrivateContent\CustomerData;

use Magento\Customer\Api\CustomerRepositoryInterface;
use Magento\Customer\CustomerData\SectionSourceInterface;
use Magento\Customer\Helper\Session\CurrentCustomer;

class CustomerInfo implements SectionSourceInterface
{
    /**
     * CustomerInfo constructor.
     * @param CurrentCustomer $currentCustomer
     * @param CustomerRepositoryInterface $customerRepository
     */
    public function __construct(
        CurrentCustomer $currentCustomer,
        CustomerRepositoryInterface $customerRepository
    )
    {
        $this->currentCustomer = $currentCustomer;
        $this->customerRepository = $customerRepository;
    }

    /**
     * @return array
     * @throws \Magento\Framework\Exception\LocalizedException
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getSectionData()
    {
        $customerId = $this->currentCustomer->getCustomerId();
        $customer = $this->customerRepository->getById($customerId);
        $legacyAccountNumber = $customer->getCustomAttribute('legacy_account_number');

        return [
            'legacy_account_number' => $legacyAccountNumber->getValue()
        ];
    }

}