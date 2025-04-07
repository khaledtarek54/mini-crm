<?php

namespace App\Services;

use App\Repositories\CustomerRepository;
use App\Models\Customer;

class CustomerService
{
    protected $customerRepository;

    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function addCustomer(array $data, int $employeeId): Customer
    {
        return $this->customerRepository->createCustomer($data, $employeeId);
    }

    public function getCustomer(int $id): ?Customer
    {
        return $this->customerRepository->getCustomerById($id);
    }
}
