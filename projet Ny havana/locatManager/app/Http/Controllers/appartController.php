<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appart;
use App\Models\Batiment;
use Illuminate\Validation\Rule;


class appartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $apparts = Appart::all();
        return view('apparts.appart',compact('apparts'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $batiments = Batiment::all();
        return view('apparts.insert',compact('batiments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $creat = $request -> validate(
                                    [
                                        'id_batiment'=>'required',
                                        'etage' => 'required|max:10',
                                        'logement' => 'required|unique:apparts,logement',
                                        'loyer'=>'required',
                                    ]
                                    );
        $insert = Appart::create($creat);
        return redirect('/appart');
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
        $batiments = Batiment::all();
        $appart = Appart::find($id);
        return  view('apparts.edit',compact('appart','batiments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $update = $request -> validate(
                                    [
                                        'id_batiment'=>'required',
                                        'etage' => 'required|max:10',
                                        'logement' => ['required',Rule::unique('apparts','logement')->ignore($id)],
                                        'loyer'=>'required',
                                    ]
                                    );
        $appart=Appart::find($id);
        $appart->update($update);
        return redirect('/appart')->with('success','Update success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
