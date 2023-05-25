<?php

namespace App\Services;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class UserService implements \App\Interfaces\UserServiceInterface
{

    public function isValidCurrentUserPassword($userId, $currentInputPassword): bool
    {
        $user = User::query()->where('id', $userId)->select('id', 'password')->first();
        if (empty($user) || empty($user->password)) {
            return false;
        }

        if (!Hash::check($currentInputPassword, $user->password)) {
            return false;
        }

        return true;
    }

    public function changeUserPassword($user, $newPassword)
    {
        if (empty($newPassword)) {
            return;
        }

        $user->password = Hash::make($newPassword);
        $user->update();
    }

    public function getUserByEmail($email)
    {
        return User::query()->where('email', $email)->first();
    }

    public function sendEmailResetPassword($email)
    {
        $subject = config('app.name'). " - Reset password";
        $blade = "emails.reset-password";

        $user = $this->getUserByEmail($email);
        if (empty($email)) {
            return;
        }

        $token = randomNumber(20);
        $user->fill([
            'reset_password_code' => Hash::make($token),
            'reset_password_code_at' => now()
        ])->update();

        $contentData = [
            'token' =>  $token,
            'email' =>  $email
        ];

        sendEmailHelper($email, $subject, $blade, $contentData);
    }

    public function isValidResetPasswordCode($user, $resetPasswordCode): bool
    {
        $userResetCode = $user->reset_password_code;
        if (empty($userResetCode)) {
            return false;
        }

        if (!Hash::check($resetPasswordCode, $userResetCode)) {
            return false;
        }

        $resetRequestAt = (new Carbon())::createFromTimeString($user->reset_password_code_at);
        $now = now();

        $resetRequestExpireAt = $resetRequestAt->addMinutes(User::RESET_PASSWORD_LIFE_TIME);
        if ($resetRequestExpireAt->lt($now)) {
            return false;
        }

        return true;
    }

    public function clearResetPasswordInfo($user)
    {
        if (empty($user)) {
            return;
        }

        $user->fill([
            'reset_password_code' => null,
            'reset_password_code_at' => null
        ])->update();
    }

    public function createUser($data): User
    {
        $user = new User();
        $user->fill($data)->save();
        return $user;
    }

    public function updateUser($data, $user)
    {
        $user->fill($data)->update();
        $user->update();

        return $user;
    }

    public function getUsersQuery($select = ['users.*']): \Illuminate\Database\Eloquent\Builder
    {
        return User::query()->select($select);
    }

    public function getUserById($id, $select = ['users.*'])
    {
        return User::query()->where('id', $id)
            ->select($select)
            ->first();
    }
}