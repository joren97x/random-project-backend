<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // ge return tanang todos gikan sa database
        return ['todos' => Todo::all()];
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // ge validate una niya kung naa bay title ug dueTime
        $request->validate([
            'title' => 'required',
            'dueTime' => 'required'
        ]);

        // then nag insert ug todo sa database
        Todo::create($request->all());

        return response(['message' => 'success']);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return ['todo' => Todo::find($id)];
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        // ge validate una niya kung naa bay title, completed ug dueTime
        $request->validate([
            'title' => 'required',
            'completed' => 'required',
            'dueTime' => 'required'
        ]);

        // then gikuha ang todo
        $todo = Todo::find($id);

        // dire ge set niya ang bag-ong data sa todo
        $todo->title = $request->title;
        $todo->completed = $request->completed;
        $todo->dueTime = $request->dueTime;

        // dayon ge save or update
        $todo->save();

        return response(['message' => 'updated']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // ge delete toinkss
        return Todo::destroy($id);
    }
}
