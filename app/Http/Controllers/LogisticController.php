<?php

namespace App\Http\Controllers;

use App\Models\Logistic;

class LogisticController extends Controller
{
    public function getAll()
    {
        $Logistics = Logistic::all();

        return response()->json($Logistics);
    }
  

}
