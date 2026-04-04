<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'from_account_id',
        'to_account_id',
        'amount'
    ];

    public function fromAccount()
    {
        return $this->belongsTo(BankAccount::class, 'from_account_id');
    }

    public function toAccount()
    {
        return $this->belongsTo(BankAccount::class, 'to_account_id');
    }
}
