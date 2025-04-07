<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\Customer;
use Illuminate\Support\Collection;

class UserRepository
{
    public function getAllUsers(): Collection
    {
        return User::all();
    }

    public function createEmployee(array $data): User
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'role' => User::ROLE_EMPLOYEE,
        ]);
    }

    public function assignCustomerToEmployee(int $customerId, int $employeeId): bool
    {
        $customer = Customer::findOrFail($customerId);
        $customer->employee_id = $employeeId;
        return $customer->save();
    }
}
