<?php

namespace Domain\Todo\Actions;

use Domain\Todo\Models\Todo;

class UpdateTodoAction
{
    public function execute(Todo $todo, array $data) : Todo
    {
        Todo::update($data);

        return $todo;
    }
}
