<?php

namespace Domain\Todo\Actions;

use Domain\Todo\DataTransferObjects\TodoData;
use Domain\Todo\Exceptions\TodoTitleExists;
use Domain\Todo\Models\Todo;

class CreateTodoAction
{
    public function execute(TodoData $data) : Todo
    {
         if (
             Todo::query()->whereTitle($data->title)->exists()
         ) {
             throw new TodoTitleExists($data->title);
         }

        return Todo::create($data->all());
    }
}
