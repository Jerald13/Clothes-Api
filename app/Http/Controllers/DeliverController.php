<?php

namespace App\Http\Controllers;
use App\Models\Deliver;

use Illuminate\Http\Request;

class DeliverController extends Controller
{
    public function index()
    {
        $deliver = Deliver::all('deliver');
        return response()->json($deliver);
    }
}
