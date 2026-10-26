<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Locataires;
use Illuminate\Validation\Rule;

class locat extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $locataires = Locataires::all();
        return view('index',compact('locataires'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('insertlocat.insert');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $insert = $request -> validate
        ([
            'type'=> 'required|in:personne,entreprise',
            'nom'=>'required|max:100',
            'prenom'=> 'exclude_unless:type,personne|required|max:100',
            'contact' => 'required|min:3',
            'mail' => 'nullable|min:5',
            'cin' => 'exclude_unless:type,personne|required|min:5|unique:locataires,cin',
            'nif' => 'exclude_unless:type,entreprise|required|min:5|unique:locataires,nif',
            'stat' => 'exclude_unless:type,entreprise|required|min:5|unique:locataires,stat',
            'adresse' => 'exclude_unless:type,entreprise|required',
        ]);
        $insert['statut'] = 'actif';
        $toinsert = Locataires::create($insert);
        return redirect('/home');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $show = Locataires::find($id);
        return view('apparts.show', compact('show'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $locataires = Locataires::find($id);
        return view('insertlocat.edit',compact('locataires'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $update = $request->validate(
            [
            'type'=> 'required|in:personne,entreprise',
            'nom'=>'required|max:100',
            'prenom'=> 'exclude_unless:type,personne|required|max:100',
            'contact' => 'required|min:3',
            'mail' => 'nullable|min:5',
            'cin' => ['exclude_unless:type,personne','required','min:5',Rule::unique('locataires', 'cin')->ignore($id)],
            'nif' => ['exclude_unless:type,entreprise','required','min:5',Rule::unique('locataires','nif')->ignore($id)],
            'stat' =>['exclude_unless:type,entreprise','required','min:5',Rule::unique('locataires','stat')->ignore($id)],
            'adresse' => 'exclude_unless:type,entreprise|required',
            ]
        );
        $locataire = Locataires::find($id);
        $locataire->update($update);
        return redirect('/home')->with('success','update success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         $locataire = Locataires::find($id);
         $locataire->delete();
         return redirect('/home');
    }
}
