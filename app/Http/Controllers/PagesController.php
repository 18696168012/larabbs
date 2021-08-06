<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function root(Request $request)
    {
        //dd($request->is(''));
        //dd(\Auth::user()->hasVerifiedEmail());
        return view('pages.root');
    }
}
