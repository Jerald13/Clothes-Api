<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FreeGift;
class FreeGiftController extends Controller
{

    public function index()
    {
        $freegift = freeGift::all();
        return response()->json($freegift);
    }

}
