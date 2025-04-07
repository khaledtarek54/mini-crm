<?php

namespace App\Services;

use App\Repositories\UserRepository;
use App\Repositories\CustomerRepository;
use App\Models\User;

class UserService
{
    protected $userRepository;
    protected $customerRepository;

    public function __construct(UserRepository $userRepository, CustomerRepository $customerRepository)
    {
        $this->userRepository = $userRepository;
        $this->customerRepository = $customerRepository;
    }

    public function addEmployee(array $data): User
    {
        return $this->userRepository->createEmployee($data);
    }

    public function assignCustomerToEmployee(int $customerId, int $employeeId): bool
    {
        return $this->userRepository->assignCustomerToEmployee($customerId, $employeeId);
    }
}
