<?php

namespace App\Http\Controllers;

use App\Todo;
use App\Http\Resources\TodoResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(TodoResource::collection(Todo::all(), 200));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the request
        $validate = Validator::make($request->toArray(), [
            'name' => 'required',
            'category_id' => 'required',
            'status' => 'required',
        ]);

        if ($validate->fails()) {
            return response($validate->errors(), 400);
        }

        // if validation passes, create a new todo from the validated
        // data and return it
        return response(new TodoResource(Todo::create($validate->validate())), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  Todo $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        return response(new TodoResource($todo), 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Todo $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todo $todo)
    {
        // Validate the request
        $validate = Validator::make($request->toArray(), [
            'name' => 'required',
            'category_id' => 'required',
            'status' => 'required',
        ]);

        if ($validate->fails()) {
            return response($validate->errors(), 400);
        }

        // if validation passes, update to todo and return it
        $todo->update($validate->validate());
        return response(new TodoResource($todo), 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Todo $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        $todo->delete();
        return response(null, 204);
    }
}
