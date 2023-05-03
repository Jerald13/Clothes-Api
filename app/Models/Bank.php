<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $table = 'bank';

    protected $fillable = [
        'name',
        'method',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'used' => 'boolean',
    ];

    public function bankAccounts()
    {
        return $this->hasMany(BankAccount::class);
    }
}
