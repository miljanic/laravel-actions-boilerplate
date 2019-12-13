<?php


namespace Domain\Todo\DataTransferObjects;


use Illuminate\Http\Request;
use Spatie\DataTransferObject\DataTransferObject;

class TodoData extends DataTransferObject
{

    /**
     * @var string
     */
    public string $title;

    public static function fromRequest(Request $request): self
    {
        return new self([
            'title' => $request->get('title'),
//            'user_id' => $request->user()->id
        ]);
    }
}
