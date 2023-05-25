<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title',config('app.name'))</title>
    <base href="{{asset('')}}">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="shortcut icon" href="{{ asset('" type="image/vnd.microsoft.icon') }}">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <!-- Bootstrap -->
    <link href="{{ asset('backend/plugins/bootstrap-3.3.7-dist/css/bootstrap.min.css') }}" rel="stylesheet"/>
    <link rel="stylesheet" href="{{ asset('backend/plugins/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/bootstrap-timepicker/dist/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/app.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/css/app.css?v=').random_bytes(10) }}" />
    <link rel="stylesheet" href="{{ asset('backend/css/sidebar.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/css/class.css') }}" />
    <link rel="stylesheet" href="{{asset('backend/plugins/intl-tel-input-17.0.0/intl-tel-input-17.0.0/build/css/intlTelInput.css')}}"/>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Loading.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery-confirm.min.css') }}">
    @yield('header')

    <style>
        .pointer {
            cursor: pointer;
        }

        .name-hover:hover {
            background-color: blue !important;
            color: whitesmoke !important;
        }

        .badge-warning {
            color: #212529;
            background-color: #ffc107;
        }

        .badge-primary {
            color: #fff;
            background-color: #007bff;
        }

        .badge-secondary {
            color: #fff;
            background-color: #6c757d;
        }

        .badge-success {
            color: #fff;
            background-color: #28a745;
        }

        .badge-danger {
            color: #fff;
            background-color: #dc3545;
        }

        .badge-info {
            color: #fff;
            background-color: #17a2b8;
        }

        .badge-light {
            color: #212529;
            background-color: #f8f9fa;
        }

        .badge-dark {
            color: #fff;
            background-color: #343a40;
        }

    </style>
    @stack('css')
</head>