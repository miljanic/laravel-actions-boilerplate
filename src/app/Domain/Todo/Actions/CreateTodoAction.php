<?php

namespace Domain\Todo\Actions;

use Domain\Todo\Exceptions\TodoTitleExists;
use Domain\Todo\Models\Todo;

class CreateTodoAction
{
    // TODO: make some dto for input
    public function execute(array $data) : Todo
    {
         if (
             Todo::where('title', $data['title'])->exists()
         ) {
             throw new TodoTitleExists($data['title']);
         }

        return Todo::create($data);
    }
}
