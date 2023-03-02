<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FreeGift;
class FreeGiftController extends Controller
{
    public function index(){

    return FreeGift::all();
    }
}
