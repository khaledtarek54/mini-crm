<?php

namespace App\Repositories;

use App\Models\Customer;
use Illuminate\Support\Collection;

class CustomerRepository
{
    public function createCustomer(array $data, int $employeeId): Customer
    {
        return Customer::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'address' => $data['address'],
            'employee_id' => $employeeId,
        ]);
    }

    public function getCustomerById(int $id): ?Customer
    {
        return Customer::find($id);
    }
}
