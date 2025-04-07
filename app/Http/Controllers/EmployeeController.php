<?php

namespace App\Http\Controllers;

use App\Models\Action;
use App\Services\ActionService;
use App\Services\CustomerService;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use App\Http\Requests\AddActionRequest;
use App\Http\Requests\AddCustomerRequest;
use App\Http\Requests\ChangeActionResultRequest;

class EmployeeController extends Controller
{
    protected $customerService;
    protected $actionService;

    public function __construct(CustomerService $customerService, ActionService $actionService)
    {
        $this->customerService = $customerService;
        $this->actionService = $actionService;
    }


    public function addCustomer(AddCustomerRequest $request)
    {
        $customer = $this->customerService->addCustomer($request->validated(), auth()->user()->id);
        return response()->json($customer, 201);
    }

    public function addAction(AddActionRequest $request, $customerId)
    {
        $action = $this->actionService->addAction([
            'customer_id' => $customerId,
            'employee_id' => auth()->user()->id,
            'action_type' => $request->action_type,
            'result' => $request->result,
        ]);

        return response()->json($action, 201);
    }
    public function changeResult(ChangeActionResultRequest $request): JsonResponse
    {
        $validated = $request->validated();
        
        $action = Action::find($validated['action_id']);

        $action->result = $validated['result'];
        $action->save();

        return response()->json([
            'message' => 'Action result updated successfully.',
            'action' => $action
        ]);
    }
}
