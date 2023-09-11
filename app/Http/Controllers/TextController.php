<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        return to_route(('index'));
        //return redirect()->route('EnglishTexts.index');
    }
}
