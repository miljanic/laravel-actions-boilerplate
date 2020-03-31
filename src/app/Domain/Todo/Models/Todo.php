<?php

namespace Domain\Todo\Models;

use App\User;
use Domain\Todo\Collections\TodoCollection;
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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function newEloquentBuilder($query): TodoQueryBuilder
    {
        return new TodoQueryBuilder($query);
    }

    public function newCollection(array $models = []): TodoCollection
    {
        return new TodoCollection($models);
    }
//    ERROR: LessSpecificReturnStatement - app/Domain/Todo/Models/Todo.php:39:16 - The type 'Illuminate\Database\Eloquent\Builder'
// is more general than the declared return type
// 'Domain\Todo\QueryBuilders\TodoQueryBuilder' for Domain\Todo\Models\Todo::query
//        return parent::query();

    public static function query() : TodoQueryBuilder
    {
        return static::query();
    }
}
