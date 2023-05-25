<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>{{ config('app.name') }}</title>

    <!-- Bootstrap -->
    <link
            href="{{asset('backend/bootstrap-3.3.7-dist/css/bootstrap.min.css')}}"
            rel="stylesheet"
    />
    <link rel="stylesheet" href="{{asset('backend/css/app.css')}}"/>
    <link rel="stylesheet" href="{{asset('backend/css/auth.css')}}"/>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>

        .center {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 50%;
        }

    </style>
</head>
<body>
<!--Start  Sidebar -->
<div class="container full-wrapper">
    <div class="auth h-100">
        <img class="auth__brands center" src="{{asset('backend/images/logo_login_admin.png')}}" alt=""/>
        <div class="card card-container">
            <form class="form-auth" method="post" action="{{route('password.reset.store')}}">
                @include('admin.layouts.flash-message')
                @csrf
                <input type="hidden" name="email" value="{{$email}}">
                <input type="hidden" name="reset_password_code" value="{{$resetCode}}">

                <div class="form-group mt-5">
                    <div for="">New password</div>
                    <input type="password" name="password" id="" class="form-control form-custom" placeholder="Password"
                           autofocus/>
                    @include("admin.partial.error-field-v2", with(['column' => 'password']))
                </div>
                <div class="form-group mt-5">
                    <div for="">Confirm password</div>
                    <input type="password" name="password_confirmation" id="" class="form-control form-custom"
                           placeholder="Confirm password"
                           autofocus/>
                    @include("admin.partial.error-field-v2", with(['column' => 'password_confirmation']))
                </div>

                <div class="d-flex justify-content-center" style="margin: 5rem auto">

                    <button type="submit" class="btn btn-master center"
                            style="background-color: #F78A29;color: #000000;text-transform: uppercase">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!--End Sidebar -->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{asset('backend/bootstrap-3.3.7-dist/js/bootstrap.min.js')}}"></script>
</body>
</html>



