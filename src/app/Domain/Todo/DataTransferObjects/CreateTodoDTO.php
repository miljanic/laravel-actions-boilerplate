<?php

namespace Domain\Todo\DataTransferObjects;

use Illuminate\Http\Request;
use Spatie\DataTransferObject\DataTransferObject;

class CreateTodoDTO extends DataTransferObject
{

    /**
     * @var string
     */
    public string $title;

    /**
     * @var int
     */
    public int $user_id;

    public static function fromRequest(Request $request): self
    {
        return new self([
            'title' => $request->get('title'),
            'user_id' => $request->user()->id
        ]);
    }
}
