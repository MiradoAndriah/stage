<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Batiment;
use Illuminate\Validation\Rule;

class batimentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $batiments = Batiment::all();
        return view('batiment.batiment',compact('batiments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('batiment.insertbat');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $newbat = $request -> validate(
            [
                'nom_de_batiment' => 'required|unique:batiments,nom_de_batiment'
            ],
            [
                'nom_de_batiment.unique' => 'The name of building already existed'
            ]);
        $insertbat = Batiment::create($newbat);
        return redirect('/batiment');
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
        $batiment = Batiment::find($id);
        return view('batiment.edit',compact('batiment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $update = $request->validate(
            [
                'nom_de_batiment' => ['required',Rule::unique('batiments','nom_de_batiment')->ignore($id)]
            ],
            [
                'nom_de_batiment.unique' => 'The name of building already existed'
            ]);
        $batiment = Batiment::find($id);
        $batiment->update($update);
        return redirect('/batiment')->with('success','Update success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
