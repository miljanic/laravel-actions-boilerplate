<?php

namespace App\Api\Queries;

use Domain\Todo\Models\Todo;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class TodosQuery extends QueryBuilder
{
    public function __construct(Request $request)
    {
        $query = Todo::query();

        parent::__construct($query, $request);

        $this->allowedIncludes(['user']);

        $this->allowedSorts([
            'is_done',
            'title',
            'created_at'
        ]);
        $this->defaultSort('-created_at');
    }
}
