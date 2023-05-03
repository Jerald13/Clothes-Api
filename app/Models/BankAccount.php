<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    use HasFactory;

    protected $table = 'bankaccount';

    protected $fillable = ['bank_id', 'username', 'password', 'balance'];

    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }
}
