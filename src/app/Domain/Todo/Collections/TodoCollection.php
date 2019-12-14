<?php


namespace Domain\Todo\Collections;


use Domain\Todo\Models\Todo;
use Illuminate\Support\Collection;

class TodoCollection extends Collection
{
    public function whereDone(bool $done = true): self
    {
        return $this->filter(fn(Todo $todo) => $todo->is_done === $done);
    }
}
