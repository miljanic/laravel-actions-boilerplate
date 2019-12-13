<?php

namespace App\Api\Todo\Controllers;

use App\Api\Todo\Requests\CreateTodoRequest;
use Domain\Todo\Actions\CreateTodoAction;
use App\Http\Controllers\Controller;
use Domain\Todo\DataTransferObjects\TodoData;
use Domain\Todo\Exceptions\TodoTitleExists;
use Domain\Todo\Models\Todo;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    private CreateTodoAction $createTodoAction;

    public function __construct(CreateTodoAction $createTodoAction)
    {
        $this->createTodoAction = $createTodoAction;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateTodoRequest $request
     * @return JsonResponse
     * @throws TodoTitleExists
     */
    public function store(CreateTodoRequest $request)
    {
        $todoData = TodoData::fromRequest($request);
        $todo = $this->createTodoAction->execute($todoData);

        return response()->json($todo);
    }

    /**
     * @param Todo $todo
     * @return JsonResponse
     */
    public function show(Todo $todo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Todo $todo
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Todo $todo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Todo $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        //
    }
}
