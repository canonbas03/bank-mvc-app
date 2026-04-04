<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    protected $fillable = ['client_id', 'bankAccountNumber', 'cardNumber', 'balance'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function outgoingTransactions()
    {
        return $this->hasMany(Transaction::class, 'from_account_id');
    }

    public function incomingTransactions()
    {
        return $this->hasMany(Transaction::class, 'to_account_id');
    }
}
