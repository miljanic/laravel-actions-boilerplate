<?php

namespace Domain\Todo\Actions;

use Domain\Todo\DataTransferObjects\CreateTodoDTO;
use Domain\Todo\Exceptions\TodoTitleExists;
use Domain\Todo\Models\Todo;

class CreateTodoAction
{
    public function execute(CreateTodoDTO $data) : Todo
    {
         if (
             Todo::query()->whereTitle($data->title)->exists()
         ) {
             throw new TodoTitleExists($data->title);
         }

        return Todo::create($data->all());
    }
}
