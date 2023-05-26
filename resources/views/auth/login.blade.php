<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>{{ config('app.name') }}</title>

    <!-- Bootstrap -->
    <link href="{{asset('backend/bootstrap-3.3.7-dist/css/bootstrap.min.css')}}" rel="stylesheet"/>
    <link rel="stylesheet" href="{{asset('backend/css/app.css')}}"/>
    <link rel="stylesheet" href="{{asset('backend/css/auth.css')}}"/>
    <link rel="stylesheet" href="{{asset('backend/css/login_admin.css')}}"/>
    <style>
        @media screen and (max-width: 375px) {
            .auth__brands {
                margin-top: 70px;
                height: 180px;
                padding: 16px;
            }
        }

        @media screen and (max-width: 390px) {
            .card-container.card {
                width: 375px !important;
                padding: 2rem 2rem !important;
            }

            .form-mobile {
                margin-left: 12px !important;
            }
        }

        @media screen and (max-width: 375px) {
            .card-container.card {
                width: 352px !important;
            }

            .form-mobile {
                margin-left: 1px !important;
            }
        }
    </style>
</head>

<body>
<!--Start  Sidebar -->
<div class="container full-wrapper">
    <div id="google_translate_element"></div>
    <div class="auth h-100">
        <div class="card card-container form-mobile">
            <form class="form-auth mt-4" method="post" spellcheck="false" autocomplete="on" action="{{ route('post-login') }}">
                {{ csrf_field() }}
                @include('admin.layouts.flash-message')
                <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="user-name">User name</label>
                    <input type="text" name="user_name" id="user-name" value="{{ old('user_name') }}"
                           class="form-control form-custom"
                           placeholder="User name" autofocus/>
                    @include("admin.partial.error-field-v2", with(['column' => 'user_name']))

                </div>
                <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password-sign-in">Password</label>
                    <input type="password" name="password" id="password-sign-in" class="form-control form-custom"
                           placeholder="Password"/>
                    @include("admin.partial.error-field-v2", with(['column' => 'password']))
                </div>

                <div style="display: flex">
                    <div>
                        <a href="{{route('password.forgot')}}" class="forgot-password"> Forgot password</a>
                    </div>
                    <div style="margin-left: 50%">
                        <a style="color: black" href="{{route('get-register')}}" class="register"> Register</a>
                    </div>
                </div>
                <button class="btn btn-master"
                        style="margin-top: 3.5rem;background-color: #F78A29;color: #000000; font-size: 16px;"
                        type="submit">
                    Login
                </button>
            </form>
        </div>
    </div>
</div>

<!--End Sidebar -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="{{asset('backend/bootstrap-3.3.7-dist/js/bootstrap.min.js')}}"></script>

</body>

</html>



