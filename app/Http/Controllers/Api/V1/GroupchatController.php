<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Groupchat;
use App\Http\Requests\StoreGroupchatRequest;
use App\Http\Requests\UpdateGroupchatRequest;
use Illuminate\Http\Request;

class GroupchatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return Groupchat::with('user')->get();
        
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
        $data = $request->validate([
            'user_id' => 'required',
            'message' => 'required',
        ]);

        Groupchat::create($data);
        return response()->json(['message' => 'what up'], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Groupchat $groupchat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Groupchat $groupchat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Groupchat $groupchat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Groupchat $groupchat)
    {
        //
    }
}
