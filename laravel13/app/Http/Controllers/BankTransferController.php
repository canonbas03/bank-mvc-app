<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\BankAccount;
use App\Models\Transaction;

class BankTransferController extends Controller
{

    public function create()
    {
        $client = auth()->user()->client;
        return view('transfers.create', compact("client"));
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

        if ($user->role === 'client') {
            $client = $user->client;

            $fromAccount = BankAccount::where('id', $validated['from_account_id'])
                ->where('client_id', $client->id)
                ->firstOrFail();
        } else {
            $fromAccount = BankAccount::findOrFail($validated['from_account_id']);
        }

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

            Transaction::create([
                'from_account_id' => $fromAccount->id,
                'to_account_id' => $toAccount->id,
                'amount' => $validated['amount'],
            ]);
        });

        return back()->with('success', 'Transfer successful!');
    }

    public function history()
    {
        $client = auth()->user()->client;

        $accountIds = $client->bankAccounts->pluck('id');

        $transactions = Transaction::whereIn('from_account_id', $accountIds)
            ->orWhereIn('to_account_id', $accountIds)
            ->latest()
            ->get();

        return view('transfers.history', compact('transactions'));
    }
}
