<?php

namespace App\Repositories;

use App\Models\Action;

class ActionRepository
{
    public function createAction(array $data): Action
    {
        return Action::create([
            'customer_id' => $data['customer_id'],
            'employee_id' => $data['employee_id'],
            'action_type' => $data['action_type'],
            'result' => $data['result'],
        ]);
    }
}
