<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('contas.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('contas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
       dd("cadastrar");
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        return view('contas.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        return view('contas.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update()
    {
       dd("Editar");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        dd("apagar");
    }
}
