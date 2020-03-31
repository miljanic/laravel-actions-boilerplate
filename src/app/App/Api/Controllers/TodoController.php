<?php

namespace App\Api\Controllers;

use App\Api\Queries\TodosQuery;
use App\Api\Todo\Requests\CreateTodoRequest;
use App\Api\Todo\Requests\UpdateTodoRequest;
use Domain\Todo\Actions\CreateTodoAction;
use App\Http\Controllers\Controller;
use Domain\Todo\Actions\UpdateTodoAction;
use Domain\Todo\DataTransferObjects\CreateTodoDTO;
use Domain\Todo\DataTransferObjects\UpdateTodoDTO;
use Domain\Todo\Exceptions\TodoTitleExists;
use Domain\Todo\Models\Todo;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    private CreateTodoAction $createTodoAction;
    /**
     * @var UpdateTodoAction
     */
    private UpdateTodoAction $updateTodoAction;

    /**
     * TodoController constructor.
     * @param CreateTodoAction $createTodoAction
     * @param UpdateTodoAction $updateTodoAction
     */
    public function __construct(
        CreateTodoAction $createTodoAction,
        UpdateTodoAction $updateTodoAction
    ) {
        $this->createTodoAction = $createTodoAction;
        $this->updateTodoAction = $updateTodoAction;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @param TodosQuery $todosQuery
     * @return Builder[]|Collection|\Illuminate\Support\Collection
     */
    public function index(Request $request, TodosQuery $todosQuery)
    {
        return $todosQuery->get();
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
        $todoCreateData = CreateTodoDTO::fromRequest($request);
        $todo = $this->createTodoAction->execute($todoCreateData);

        return response()->json($todo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateTodoRequest $request
     * @param Todo $todo
     * @return Todo
     */
    public function update(UpdateTodoRequest $request, Todo $todo)
    {
        $todoUpdateData = UpdateTodoDTO::fromRequest($request);

        return $this->updateTodoAction->execute($todo, $todoUpdateData);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Todo $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
    }
}
