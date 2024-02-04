<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use Illuminate\Support\Facades\Input;

class ProfileController extends Controller
{
    public function index()
    {
        return \view('multi-profile.profile');
    }
    
    public function store(Request $request)
    {
        //working(insert more than one row)
        // $data = [];
        // for ($i = 0; $i < count($request->name); $i++) {
        //     $data[] = [
        //         'user_id' => 1,
        //         'name' => $request->name[$i],
        //         'email' => $request->email[$i]
        //     ];
        // }
        // Profile::insert($data);  //create not working

        //working(insert more than one row)
        for($i=0; $i<count($request->name); $i++) {
            $Profile = new Profile();
            $Profile->user_id=1;
            $Profile->name=$request->name[$i];
            $Profile->email=$request->email[$i];
            $Profile->save();
        }

        return \redirect(route('pro_index'))->with('success_msg', 'Profile added successfully.');
    }
}
