<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Locataires;
use App\Models\Appart;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payments = Payment::all();
        return view('payment.payment',compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $apparts= Appart::all();
        $locataires = Locataires::all();
        return view('payment.insert',compact('locataires','apparts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $create = $request -> validate(
                                    [
                                        'locataire_id' => 'required',
                                        'appart_id' => 'required',
                                        'amount'=> 'required',
                                        'payment_date' => 'required',
                                        'payment_method' => 'required',
                                        'month' => 'required',
                                        'year' => 'required',
                                        'status' => 'required'
                                    ],
                                    );
        $insert = Payment::create($create);
        return redirect('/payment');
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
        //
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
        //
    }
}
