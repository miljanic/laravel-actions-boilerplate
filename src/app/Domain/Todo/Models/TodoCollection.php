<?php


namespace Domain\Todo\Models;


use Illuminate\Support\Collection;

class TodoCollection extends Collection
{
    public function whereDone(): self
    {
        return $this->filter(function(Todo $todo) {
            return $todo->is_done;
        });
    }
}
