<?php

namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
  
class LangController extends Controller
{
    public function index()
    {
        return view('lang');
    }
  
    public function change(Request $request)
    {
        // dd($request->all());
        App::setLocale($request->lang);
        session()->put('locale', $request->lang);
        // dd(session()->get('locale'));
  
        return redirect()->back();
    }
}