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
            'text' => $request->text,
        ]);

        return to_route(('index'));
        //return redirect()->route('EnglishTexts.index');
    }
}
