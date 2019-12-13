<?php

namespace Domain\Todo\Models;

use Domain\Todo\QueryBuilders\TodoQueryBuilder;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $guarded = ['id'];

    protected $casts = [
        'is_done' => 'boolean'
    ];

    public string $title;

    public bool $is_done = false;

    public function newEloquentBuilder($query): TodoQueryBuilder
    {
        return new TodoQueryBuilder($query);
    }

    public function newCollection(array $models = [])
    {
        return new TodoCollection($models);
    }

    public static function query() : TodoQueryBuilder
    {
        return parent::query();
    }
}
