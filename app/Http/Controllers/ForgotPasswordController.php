<?php

namespace App\Http\Controllers;
 
use Carbon\Carbon; 
use App\Models\User; 
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\{DB, Mail, Hash, Auth, Session};

class ForgotPasswordController extends Controller
{
    public function login(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);
        
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return '<h2>User logedIn successfully.</h2>';
        }
        return back()->with('error', 'Email or password is incorrect.');
    }

    public function logout()
    {
        if(Auth::check()) {
            Session::flush();
            Auth::logout();
            return view('forget-pwd.auth.login');
        }
    }

    public function showForgetPasswordForm()
    {
       return view('forget-pwd.auth.forgetPassword');
    }
    
    public function submitForgetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $token = Str::random(64);

        DB::table('password_reset_tokens')->insert([
            'email' => $request->email, 
            'token' => $token, 
            'created_at' => Carbon::now()
          ]);

        Mail::send('forget-pwd.email.forgetPassword', ['token' => $token], function($message) use($request){
            $message->to($request->email);
            $message->subject('Reset Password');
        });

        return back()->with('message', 'We have e-mailed your password reset link!');
    }
    
    public function showResetPasswordForm($token) { 
        return view('forget-pwd.auth.forgetPasswordLink', ['token' => $token]);
     }
     
     public function submitResetPasswordForm(Request $request)
     {
         $request->validate([
             'email' => 'required|email|exists:users',
             'password' => 'required|string|min:6|confirmed',
             'password_confirmation' => 'required'
         ]);
 
         $updatePassword = DB::table('password_reset_tokens')->where(['email' => $request->email,'token' => $request->token])->first();
 
         if(!$updatePassword){
             return back()->withInput()->with('error', 'Invalid token!');
         }
 
         User::where('email', $request->email)->update(['password' => Hash::make($request->password)]);

         DB::table('password_reset_tokens')->where(['email'=> $request->email])->delete();
 
         return redirect('/fp/login')->with('message', 'Your password has been changed!');
     }
}
