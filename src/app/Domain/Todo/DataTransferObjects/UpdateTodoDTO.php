<?php

namespace Domain\Todo\DataTransferObjects;

use Illuminate\Http\Request;
use Spatie\DataTransferObject\DataTransferObject;

class UpdateTodoDTO extends DataTransferObject
{

    /**
     * @var string
     */
    public string $title;

    /**
     * @var bool
     */
    public bool $is_done;

    public static function fromRequest(Request $request): self
    {
        return new self([
            'title' => $request->get('title'),
            'is_done' => $request->get('is_done')
        ]);
    }
}
