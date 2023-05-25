<?php

namespace App\Interfaces;

interface UserServiceInterface
{
    public function isValidCurrentUserPassword($userId, $currentInputPassword);
    public function changeUserPassword($user, $newPassword);
    public function getUserByEmail($email);
    public function sendEmailResetPassword($email);
    public function isValidResetPasswordCode($user, $resetPasswordCode);
    public function clearResetPasswordInfo($user);
    public function createUser($data);
    public function updateUser($data, $user);
    public function getUsersQuery($select = ['users.*']);
    public function getUserById($id, $select = ['users.*']);
}