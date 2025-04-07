<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;
use Illuminate\Routing\Controller;
use App\Http\Requests\AddEmployeeRequest;
use App\Http\Requests\AssignCustomerToEmployeeRequest;

class AdminController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function addEmployee(AddEmployeeRequest $request)
    {
        $employee = $this->userService->addEmployee($request->validated());
        return response()->json($employee, 201);
    }

    public function assignCustomerToEmployee(AssignCustomerToEmployeeRequest $request, $customerId)
    {
        $success = $this->userService->assignCustomerToEmployee($customerId, $request->employee_id);
        return response()->json(['success' => $success], $success ? 200 : 400);
    }
}
