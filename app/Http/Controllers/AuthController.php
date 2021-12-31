<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Location;
use App\Models\Corporation;

class AuthController extends Controller
{
    public function register(Request $request){
        $this->validate($request, [
            'username' => 'required|unique:users,username',
            'email' => 'required|unique:users,email',
            'password' => 'required'
        ]);

        $user = new User;
        $user->name = 'User Rentalku';
        $user->username = $request->username;
        $user->email = $request->email;
        $user->picture = 'default_ava.png';
        $user->role = 'user';
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect('/login')->with('errors', '');
    }

    public function login(Request $request){
    	if(Auth::attempt($request->only('username','password'))){
    		return redirect('/');
    	}
    	return redirect('/login')->with('errors', 'Your login credentials do not match an account in our system.');
    }

    public function logout(){
    	Auth::logout();
    	return redirect('/login');
    }
}
