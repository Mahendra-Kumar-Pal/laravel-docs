<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{User, Profile};
use Illuminate\Support\Facades\{Auth, Gate};

class GatePolicyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $employees = User::where('role', '=', 'employee')->get();
        if(Gate::allows('isEmployee', $employees)){
            return view('gate-policy.home', compact('employees'));
        }
        abort('403');
    }

    public function handleAdmin()
    {
        $employees=User::where('role', '=', 'employee')->get();
        return view('gate-policy.handleAdmin', compact('employees'));
    }

    public function edit(Request $request, $id){
        $employee=User::find($id);
        if(Gate::allows('view', $employee->id)){
            return view('gate-policy.edit', compact('employee'));
        }
        abort('403', 'You are unauthorised to edit');
    }

    public function update(Request $request, $id){
        User::find($id)->update($request->all());
        return back()->with('message', 'Record updated successfully');
    }

    public function delete(Request $request, $id){
        User::find($id)->delete();
        return back()->with('message', 'Record deleted successfully');
    }

    public function showProfile(Request $request, $id){
        $employee = Profile::with('user')->where('user_id', $id)->first();
        return view('gate-policy.profile', compact('employee'));
    }
}
