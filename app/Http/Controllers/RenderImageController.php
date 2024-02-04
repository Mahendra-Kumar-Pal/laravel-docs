<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RenderImageController extends Controller
{
    public function index()
    {
        return \view('render-image');
    }
    
    public function store(Request $request)
    {
        //
    }
}
