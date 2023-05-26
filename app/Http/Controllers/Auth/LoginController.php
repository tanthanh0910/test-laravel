<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
   public function showLoginForm()
   {
       return view('auth.login');
   }

   public function login(LoginRequest $request)
   {
       $credentials = $request->only('user_name', 'password');
       if (Auth::attempt($credentials)) {
           return redirect()->route('admin.users.index')
               ->with('success','Signed in');
       }

       return redirect("login")->with('danger','Login fail');
   }

   public function logout()
   {
       Auth::logout();
       return redirect()->route('login');
   }

}
