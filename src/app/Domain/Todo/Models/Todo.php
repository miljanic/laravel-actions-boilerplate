<?php

namespace Domain\Todo\Models;

use App\User;
use Domain\Todo\Collections\TodoCollection;
use Domain\Todo\QueryBuilders\TodoQueryBuilder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Todo extends Model
{
    protected $guarded = ['id'];

    protected $casts = [
        'is_done' => 'boolean'
    ];

    public string $title;

    public bool $is_done = false;

    public function user(): BelongsTo
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

    public static function query() : TodoQueryBuilder
    {
        return static::query();
    }
}
