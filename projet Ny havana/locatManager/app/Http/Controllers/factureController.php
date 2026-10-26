<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Facture;
use App\Models\Locataires;
use App\Models\Appart;

class factureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $factures = Facture::all();
        return view('facture.facture',compact('factures'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $locataires = Locataires::all();
        $apparts = Appart::all();
        return view('facture.insert',compact('locataires','apparts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request ->validate(
            [
                'locataire_id' => 'required|exists:locataires,id',
                'loyer' => 'required|integer|min:0',
                'charge_commune' => 'required|integer|min:0'
            ]
        );
        // Dernière facture
        $lastFacture = Facture::orderBy('id', 'desc')->first();
        $nextCompteur = $lastFacture ? $lastFacture->compteur + 1 : 1;

        // Format 0001, 0002, 0024
        $compteurFormat = str_pad($nextCompteur, 4, '0', STR_PAD_LEFT);

        // Année
        $annee = date('y');

        // Code fixe (tu peux changer)
        $code = 'DGPDTM';

        $numeroFacture = "FACN°{$annee}{$code}{$compteurFormat}";


        $charge = $request -> charge_commune;
        $loyer = $request -> loyer;
        $tva = $loyer * 20 / 100;
        $total = $loyer + $charge +$tva;

        $insert = Facture::create(
            [
                'numero_facture' => $numeroFacture,
                'compteur' => $nextCompteur,
                'locataire_id' => $request -> locataire_id,
                'loyer' => $loyer,
                'charge_commune' => $charge,
                'tva' => $tva,
                'total' => $total
            ]);
        return redirect('/facture');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $show = Facture::find($id);
        $locataire = Locataires::find($id);

        return view('facture.show',compact('show','locataire'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $facture = Facture::find($id);
        $locataires = Locataires::all();
        $apparts = Appart::all();
        return view('facture.edite',compact('facture','locataires','apparts'));
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
        $delete=Facture::find($id);
        $delete->delete();
        return redirect('/facture');
    }
}
