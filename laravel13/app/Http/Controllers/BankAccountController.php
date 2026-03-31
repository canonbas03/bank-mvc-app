<?php

namespace App\Http\Controllers;

use App\Models\BankAccount;
use App\Models\Client;
use Illuminate\Http\Request;

class BankAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('worker.create_bank_account');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'client_egn' => 'required|string|exists:clients,clientEgn',
            'bankAccountNumber' => 'required|string|unique:bank_accounts,bankAccountNumber',
            'cardNumber' => 'required|string|unique:bank_accounts,cardNumber',
            'balance' => 'required|numeric|min:0',
        ]);

        $client = Client::where('clientEgn', $validated['client_egn'])->first();

        BankAccount::create([
            'client_id' => $client->id,
            'bankAccountNumber' => $validated['bankAccountNumber'],
            'cardNumber' => $validated['cardNumber'],
            'balance' => $validated['balance'],
        ]);

        return redirect()->back()->with('success', 'Bank account created successfully.');
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
