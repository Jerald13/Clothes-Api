<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class freeGift extends Model
{
    use HasFactory;
    public $table = "_free_gift";

    protected $fillable = [
        'name',
        'data',
        'mime',
    ];
    
}
