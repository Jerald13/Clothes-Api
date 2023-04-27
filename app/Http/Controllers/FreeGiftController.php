<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FreeGift;
class FreeGiftController extends Controller
{
    public function index(){

    // return FreeGift::all();


    return FreeGift::all();

    return view('free-gift', compact('freeGifts'));

    }

    public function create()
    {
        return view('free-gift.create');
    }

    public function display()
    {
    return FreeGift::all();


    return view('free-gift', compact('freeGifts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'data' => 'required|file',
            'mime' => 'required',
        ]);

        $data = file_get_contents($request->file('data'));
        $mime = $request->input('mime');

        $freeGift = new FreeGift([
            'name' => $request->input('name'),
            'data' => $data,
            'mime' => $mime,
        ]);
        $freeGift->save();

        session()->flash('success', 'Free gift created successfully.');

        return redirect()->route('free-gift.index');
    }

    public function show(FreeGift $freeGift)
    {
        // return view('free-gift.show', ['freeGift' => $freeGift]);
    }

    public function edit(FreeGift $freeGift)
    {
        return view('free-gift.edit', ['freeGift' => $freeGift]);
    }

    public function update(Request $request, FreeGift $freeGift)
    {
        $request->validate([
            'name' => 'required',
            'data' => 'nullable|file',
            'mime' => 'required',
        ]);

        $freeGift->name = $request->input('name');

        if ($request->hasFile('data')) {
            $data = file_get_contents($request->file('data'));
            $mime = $request->input('mime');

            $freeGift->data = $data;
            $freeGift->mime = $mime;
        }

        $freeGift->save();

        session()->flash('success', 'Free gift updated successfully.');

        return redirect()->route('free-gift.index');
    }

    public function destroy(FreeGift $freeGift)
    {
        $freeGift->delete();

        session()->flash('success', 'Free gift deleted successfully.');

        return redirect()->route('free-gift.index');
    }

}
