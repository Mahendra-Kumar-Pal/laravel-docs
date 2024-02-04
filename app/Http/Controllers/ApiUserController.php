<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiUserController extends Controller
{
    public function index()
    {
        try {
            $users = \App\Models\User::all();
            return $users;
        } catch (\Exception $e) {
            return $e;
        }
    }
}
