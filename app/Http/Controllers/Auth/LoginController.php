<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $canAssetToAdminPage = [
        User::ROLE_MANAGER,
        User::ROLE_ADMIN,
        User::ROLE_SALE
    ];

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function username(): string
    {
        return 'user_name';
    }

    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required',
            'password' => 'required',
        ]);
    }

    protected function attemptLogin(Request $request): bool
    {
        if (!$this->guard()->attempt($this->credentials($request), $request->filled('remember'))) {
            return false;
        }

        if (!auth()->user()->is_active) {
            auth()->logout();
            return false;
        }

        return true;
    }

    protected function authenticated(Request $request, $user): \Illuminate\Http\RedirectResponse
    {
        $user = User::where('user_name',$request->input('user_name'))->first();
        if(empty($user)){
            return redirect('/login');
        }

        return redirect()->route('admin.users.index');

    }

}
