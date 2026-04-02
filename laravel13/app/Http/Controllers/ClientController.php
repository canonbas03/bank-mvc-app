<?php

namespace App\Http\Controllers;

use App\Models\BankAccount;
use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients =  Client::with('user')->get();

        return view("clients.index", compact('clients'));
    }

    public function dashboard()
    {

        return view("client.dashboard");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("clients.register");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'clientEgn' => 'required|numeric',
        ]);

        $user = User::create([
            'firstName' => $validated['firstName'],
            'lastName' => $validated['lastName'],
            'email' => $validated['email'],
            'password' => $validated['password'],
            'role' => 'client'
        ]);

        $client = Client::create([
            'user_id' => $user->id,
            'clientEgn' => $validated['clientEgn'],
        ]);

        BankAccount::create([
            'client_id' => $client->id,
            'bankAccountNumber' => "BG{$validated['clientEgn']}",
            'cardNumber' => $validated['clientEgn'],
            'balance' => 0,
        ]);

        return redirect()->route('clients.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $client = Client::findOrFail($id);

        return view('clients.show', compact('client'));
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
