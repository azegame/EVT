<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
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

        //return view('afterlogin', ['texts' => Text::where('user_id', $request->user()->id)->get()]);
        return Redirect::route('texts.show');
    }

    public function show(Request $request)
    {
        //return view('afterlogin');
        return view('afterlogin', ['texts' => Text::where('user_id', $request->user()->id)->get()]);
    }

    public function destroy(Request $request, $id)
    {
        $text = Text::find($id);
        $text->delete();
        //return view('afterlogin', ['texts' => Text::where('user_id', $request->user()->id)->get()]);
        return Redirect::route('texts.show');
    }
}
