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
}
