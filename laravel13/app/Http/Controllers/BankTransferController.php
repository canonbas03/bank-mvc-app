<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\BankAccount;

class BankTransferController extends Controller
{

    public function create()
    {
        return view('transfers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'from_account_id' => 'required|exists:bank_accounts,id',
            'to_account_number' => 'required|exists:bank_accounts,bankAccountNumber',
            'amount' => 'required|numeric|min:0.01',
        ]);

        $user = auth()->user();
        $client = $user->client;

        $fromAccount = BankAccount::where('id', $validated['from_account_id'])
            ->where('client_id', $client->id)
            ->firstOrFail();

        $toAccount = BankAccount::where('bankAccountNumber', $validated['to_account_number'])
            ->firstOrFail();

        if ($fromAccount->id === $toAccount->id) {
            return back()->withErrors(['error' => 'Cannot transfer to the same account']);
        }

        if ($fromAccount->balance < $validated['amount']) {
            return back()->withErrors(['error' => 'Insufficient funds']);
        }

        DB::transaction(function () use ($fromAccount, $toAccount, $validated) {

            $fromAccount->decrement('balance', $validated['amount']);

            $toAccount->increment('balance', $validated['amount']);
        });

        return back()->with('success', 'Transfer successful!');
    }
}
