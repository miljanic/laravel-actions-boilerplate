<?php

namespace Domain\Todo\Actions;

use Domain\Todo\DataTransferObjects\UpdateTodoDTO;
use Domain\Todo\Models\Todo;

class UpdateTodoAction
{
    public function execute(Todo $todo, UpdateTodoDTO $updateData) : Todo
    {
        $todo-> update($updateData->all());

        return $todo;
    }
}
