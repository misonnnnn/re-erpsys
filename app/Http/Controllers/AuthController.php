<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{ 
    public function index(){
        if(auth::check()){
            return redirect('/employee-dashboard');
        }
        return view('Auth.login');
    }

    public function authRequest(Request $request){
        $credentials = $request->only('username', 'password');
        $status       = false;
        $message      = false;
        if (Auth::attempt($credentials)) {
            $status        = true;
            $message       = 'Successfully logged In';
        }
        return [
            'isSuccess'  => $status,
            'message'    => $message ? $message : 'Invalid Credentials',
        ];
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    }
    
    public function getUsers(){
        return User::all();
    }

    public function getFullName(){
        $user = Auth::user();
        return response()->json([
            'fullname' => ucwords($user->firstname.' '.$user->firstname),
        ]);
    }
}


