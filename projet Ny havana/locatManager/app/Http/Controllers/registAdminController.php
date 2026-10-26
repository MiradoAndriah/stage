<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class registAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('regist');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $registre = $request->validate
                            ([
                                'nom' => 'required|max:100',
                                'mail' => 'required|unique:admins,mail|max:50',
                                'contact' => 'required',
                                'password' => 'required'
                            ]);
        $registre['password'] = Hash::make($registre['password']);
        $Admins = Admin::create($registre);
        Auth::login($Admins);
        return redirect('/login/create');
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
