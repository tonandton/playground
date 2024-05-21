<?php

namespace App\Http\Controllers;

use App\Models\Equiments;
use Illuminate\Http\Request;

class equimentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $equiments = Equiments::get();
        return view('equiments.index', compact("equiments"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('equiments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Equiments::create($request->all());
        return redirect()->route('equiments.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return dd('$id');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return dd('$id');
    }
}
