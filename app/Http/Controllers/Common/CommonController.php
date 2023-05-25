<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Http\Requests\SendEmailResetPasswordRequest;
use App\Http\Responses\APIResponse;
use App\Interfaces\UserServiceInterface;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class CommonController extends Controller
{

    private $userService;

    public function __construct(
        UserServiceInterface $userService
    )
    {
        $this->userService = $userService;
    }

    public function getForgotPassword()
    {
        return view('auth.passwords.forgot');
    }

    public function sendEmailForgotPassword(SendEmailResetPasswordRequest $request): \Illuminate\Http\RedirectResponse
    {
        $email = $request->input('email');
        $user = $this->userService->getUserByEmail($email);
        if (empty($user)) {
            return back()
                ->withInput()
                ->with('danger', 'Data not found or invalid');
        }

        $this->userService->sendEmailResetPassword($email);

        return back()->with('success', 'Action success');
    }

    public function getResetPassword($resetCode, Request $request)
    {
        $email = $request->get('email');

        return view('auth.passwords.reset', compact('resetCode', 'email'));
    }

    public function resetPassword(ResetPasswordRequest $request): \Illuminate\Http\RedirectResponse
    {
        $user = $this->userService->getUserByEmail($request->input('email'));
        if (empty($user)) {
            return back()
                ->withInput()
                ->with('danger', 'Data not found or invalid');
        }

        $isValidResetCode = $this->userService->isValidResetPasswordCode($user, $request->input('reset_password_code'));
        if (!$isValidResetCode) {
            return back()
                ->withInput()
                ->with('danger', 'Data not found or invalid');
        }


        $newPassword = $request->input('password');
        DB::beginTransaction();
        try {
            $this->userService->changeUserPassword($user, $newPassword);
            $this->userService->clearResetPasswordInfo($user);

        } catch (\Exception $e) {
            Log::info("USER | RESET PASSWORD: " . $e->getMessage());
            DB::rollBack();
        }

        DB::commit();

        return redirect()
            ->route('login')
            ->withInput()
            ->with('success', 'Successful password recovery');
    }

    public function register(RegisterRequest $request)
    {
        $user = new User();
        $user->user_name = $request->input('user_name');
        $user->email = $request->input('email');
        $user->role_id = User::ROLE_SALE;
        $user->password = Hash::make($request->input('password'));
        $user->save();
        return redirect()
            ->route('login')
            ->withInput()
            ->with('success', 'Register account successful');
    }

    public function getRegister()
    {
        return view('auth.register');
    }
}
