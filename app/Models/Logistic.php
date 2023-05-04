<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Logistic extends Model
{
    protected $table = 'logistic';

    protected $fillable = [
        'name',
        'price',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

}
