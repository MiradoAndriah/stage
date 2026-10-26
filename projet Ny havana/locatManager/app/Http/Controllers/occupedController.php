<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Locataires;
use App\Models\Batiment;
use App\Models\Appart;
use App\Models\Liste;
use Illuminate\Validation\Rule;

class occupedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $occuped = Liste::all();
        return view('occuped.occuped',compact('occuped'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $locataires = Locataires::all();
        $batiments = Batiment::all();
        $apparts = Appart::all();
        return view('occuped.insert',compact('locataires','batiments','apparts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $create = $request -> validate(
                                    [
                                        'id_locataire' => 'required',
                                        'id_batiment'=> 'required',
                                        'id_appart' => 'required|unique:listes,id_appart',
                                        'adresse' => 'required',
                                        'ville' => 'required'
                                    ],
                                    [
                                        'id_appart' => 'the appart is already used '
                                    ]
                                    );
        $insret = Liste::create($create);
        return redirect('/occuped');
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
        $locataires = Locataires::all();
        $batiments = Batiment::all();
        $apparts = Appart::all();
        $contract = Liste::findOrFail($id);
        return view('occuped.edit',compact('locataires','batiments','apparts','contract'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $update = $request -> validate(
                                    [
                                        'id_locataire' => 'required',
                                        'id_batiment'=> 'required',
                                        'id_appart' => 'required',Rule::unique('listes','id_appart')->ignore($id)
                                    ],
                                    [
                                        'id_appart' => 'the appart is already used '
                                    ]
                                    );
        $contract = Liste::find($id);
        $contract->update($update);
        return redirect('/occuped')->with('success','Update success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $contract = Liste::find($id);
        $contract->delete();
        return redirect('/occuped')->with('success','Deletion successful');
    }
}
