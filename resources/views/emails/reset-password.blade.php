@php
    $url = route('password.reset.show', [
        'token' => $token,
        'email' => $email
    ]);
@endphp

<div style="padding-bottom: 30px;">
    <p>Please click the link bellow to reset your password.</p>
    <a style="background:#F78A29; color:black; text-decoration:none; padding:10px 20px;" href="{{ $url }}">Reset your password</a>
    <br>
    <br>
    <br>
    <p>Best regards,</p>
    <p>{{config('app.name')}}</p>
</div>

