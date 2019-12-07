<?php

namespace Domain\Todo\Models;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $guarded = ['id'];

    protected $casts = [
        'is_done' => 'boolean'
    ];
}
