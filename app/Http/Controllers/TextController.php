<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Text;

class TextController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function store(Request $request)
    {
        Text::create([
            'user_id' =>  $request->user()->id,
            'text' => $request->text,
        ]);

        return view('texts', ['texts' => Text::where('user_id', $request->user()->id)->get()]);
    }

    //public function show(string $id)
    //{
    //    $texts = Text::where('user_id', $id)->get();
    //    return view('texts', ['text' => $texts]);
    //}
}
