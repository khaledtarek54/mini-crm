<?php

namespace App\Services;

use App\Repositories\ActionRepository;
use App\Models\Action;

class ActionService
{
    protected $actionRepository;

    public function __construct(ActionRepository $actionRepository)
    {
        $this->actionRepository = $actionRepository;
    }

    public function addAction(array $data): Action
    {
        return $this->actionRepository->createAction($data);
    }
}
