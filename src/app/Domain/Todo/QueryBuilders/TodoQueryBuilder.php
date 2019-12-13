<?php


namespace Domain\Todo\QueryBuilders;

use Illuminate\Database\Eloquent\Builder;

class TodoQueryBuilder extends Builder
{
    public function whereDone(bool $done = true) : self
    {
        return $this->where('is_done', '=', $done);
    }

    public function whereTitle(string $title) : self
    {
        return $this->where('title', '=', $title);
    }
}
