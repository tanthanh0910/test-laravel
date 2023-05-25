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
        body {
            background-color: #fff;
        }

        .card {
            box-shadow: none;
        }

        .center {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 50%;
        }

        .btn-master {
            width: 50% !important;
            display: block;
            margin-left: auto;
            margin-right: auto;
            margin-top: 3.5rem;
            background-color: #F78A29;
            color: #000000;
            text-transform: uppercase;
        }
    </style>
</head>
<body>
<!--Start  Sidebar -->
<div class="container full-wrapper">
    <div class="auth h-100">
        <div class="card card-container">
            <form class="form-auth" method="post" action="{{route('password.email')}}">
                @include('admin.layouts.flash-message')
                @csrf
                <div class="form-group">
                    <label for="emailSignUp">Email</label>
                    <h6 class="text-secondary">
                        Email address forgot password description
                    </h6>
                    <input
                            type="email"
                            name="email"
                            class="form-control form-custom"
                            placeholder="Email address"
                            autofocus
                    />
                    @include("admin.partial.error-field-v2", with(['column' => 'email']))
                </div>

                <div class="d-flex justify-content-center" style="">
                    <a href="{{route('login')}}" type="button" class="btn btn-master secondary mx-5" style="padding-top: 8px;">CANCEL</a>
                    <button type="submit" class="btn btn-master mx-5">Submit</button>
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


