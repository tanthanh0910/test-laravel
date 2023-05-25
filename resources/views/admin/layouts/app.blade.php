<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title',config('app.name'))</title>
    <base href="{{asset('')}}">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Tell the browser to be responsive to screen width -->
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{asset('backend/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('backend/bower_components/font-awesome/css/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('backend/bower_components/Ionicons/css/ionicons.min.css')}}">
    <!-- daterange picker -->
    <link rel="stylesheet" href="{{asset('backend/bower_components/bootstrap-daterangepicker/daterangepicker.css')}}">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet"
          href="{{asset('backend/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet"
          href="{{asset('backend/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css')}}">
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet"
          href="{{asset('backend/plugins/bootstrap-timepicker/dist/css/bootstrap-timepicker.min.css')}}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('backend/bower_components/select2/dist/css/select2.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('backend/dist/css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('backend/dist/css/skins/_all-skins.min.css')}}">

    <link href="{{ asset('backend/plugins/bootstrap-3.3.7-dist/css/bootstrap.min.css') }}" rel="stylesheet"/>
    <link rel="stylesheet" href="{{ asset('backend/plugins/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet"
          href="{{ asset('backend/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet"
          href="{{ asset('backend/plugins/bootstrap-timepicker/dist/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/app.css?v=').random_bytes(10) }}"/>
    <link rel="stylesheet" href="{{ asset('backend/css/class.css') }}"/>
    <link rel="stylesheet"
          href="{{asset('backend/plugins/intl-tel-input-17.0.0/intl-tel-input-17.0.0/build/css/intlTelInput.css')}}"/>
    <link rel="stylesheet" href="{{ asset('css/jquery-confirm.min.css') }}">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    @include('admin.layouts.header-css')
    @stack('css')
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>TL</b></span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>TEST</b> LARAVEL</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">

                {{--                    <li class="dropdown notifications-menu">--}}
                {{--                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">--}}
                {{--                            <i class="fa fa-bell-o"></i>--}}
                {{--                            <span class="label label-warning">10</span>--}}
                {{--                        </a>--}}
                {{--                        <ul class="dropdown-menu">--}}
                {{--                            <li class="header">You have 10 notifications</li>--}}
                {{--                            <li>--}}
                {{--                                <!-- inner menu: contains the actual data -->--}}
                {{--                                <ul class="menu">--}}
                {{--                                    <li>--}}
                {{--                                        <a href="#">--}}
                {{--                                            <i class="fa fa-users text-aqua"></i> 5 new members joined today--}}
                {{--                                        </a>--}}
                {{--                                    </li>--}}
                {{--                                    <li>--}}
                {{--                                        <a href="#">--}}
                {{--                                            <i class="fa fa-warning text-yellow"></i> Very long description here that--}}
                {{--                                            may not fit into the--}}
                {{--                                            page and may cause design problems--}}
                {{--                                        </a>--}}
                {{--                                    </li>--}}
                {{--                                    <li>--}}
                {{--                                        <a href="#">--}}
                {{--                                            <i class="fa fa-users text-red"></i> 5 new members joined--}}
                {{--                                        </a>--}}
                {{--                                    </li>--}}

                {{--                                    <li>--}}
                {{--                                        <a href="#">--}}
                {{--                                            <i class="fa fa-shopping-cart text-green"></i> 25 sales made--}}
                {{--                                        </a>--}}
                {{--                                    </li>--}}
                {{--                                    <li>--}}
                {{--                                        <a href="#">--}}
                {{--                                            <i class="fa fa-user text-red"></i> You changed your username--}}
                {{--                                        </a>--}}
                {{--                                    </li>--}}
                {{--                                </ul>--}}
                {{--                            </li>--}}
                {{--                            <li class="footer"><a href="#">View all</a></li>--}}
                {{--                        </ul>--}}
                {{--                    </li>--}}

                <!-- Tasks: style can be found in dropdown.less -->
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-user-circle-o"></i>
                            <span class="hidden-xs"><b>{{ optional(Auth::user())->user_name }}</b></span>
                        </a>
                        <ul class="dropdown-menu">

                            <li class="user-footer">
                                <a class="btn btn-default btn-flat"
                                   onclick="functionLogout()">Logout</a>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>
        </nav>
    </header>

    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

            <!-- sidebar menu: : style can be found in sidebar.less -->
            @include('admin.partial.sidebar')

        </section>
        <!-- /.sidebar -->
    </aside>

    <div class="content-wrapper">

        <section class="content-header">
        @include('admin.layouts.flash-message')
        <!--Success, Error or something message in here-->
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-md-12">
                    <div class="box box-success">
                        <div class="box-body">
                            @hasSection('content')
                                @yield('content')
                            @else
                                There was an error reading the content...
                        @endif
                        <!--Page html body-->
                        </div>

                    </div>
                </div>
            </div>
            <!-- /.row -->

        </section>
        <!-- /.content -->

    </div>
    <div id="overlay">
        <div class="cv-spinner">
            <span class="spinner"></span>
        </div>
    </div>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{asset('backend/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('backend/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- Select2 -->
<script src="{{asset('backend/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
<!-- InputMask -->
<!-- date-range-picker -->
<script src="{{asset('backend/bower_components/moment/min/moment.min.js')}}"></script>
<script src="{{asset('backend/bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<!-- bootstrap datepicker -->
<script src="{{asset('backend/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<!-- bootstrap color picker -->
<script src="{{asset('backend/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js')}}"></script>
<!-- SlimScroll -->
<script src="{{asset('backend/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('backend/bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('backend/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<!-- Page script -->

<script src="{{ asset('js/jquery-confirm.min.js') }}"></script>
<script src="{{ asset('js/popup-msg.js') }}"></script>
@stack('disable_ajax_loading')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': $('meta[name=csrf-token]').attr('content')
        }
    });


    $('div.alert').not('.alert-important').delay(5000).fadeOut(350);

    function functionLogout() {
        const getValueSession = sessionStorage.getItem("one_signal_id");
        let url_ = `logout?device_id=${getValueSession}`
        $.ajax({
            url: url_,
            type: 'get',
            data: null,
            success: function (data) {
                location.href = '{{route('login')}}';
            }
        });
    }

    function addSpinnerToBtn(className) {
        let $this = $(`${className}`);
{{--        $this.attr('data-loading-text', "<i class='fa fa-spinner fa-spin '></i> {{transCustomMessage('Request is being processed', '正在处理请求')}}");--}}
        $this.attr('data-loading-text', "<i class='fa fa-spinner fa-spin '></i> Request is being processed");
    }

    const BTN_LOADING_CLASS = '.btn-loading-process';
    addSpinnerToBtn(BTN_LOADING_CLASS);

    function onLoadingButton(className) {
        let $this = $(`${className}`);
        $this.button('loading');
        $this.attr("disabled", true);
    }

    function offLoadingButton(className) {
        let $this = $(`${className}`);
        $this.button('reset');
        $this.attr("disabled", false);
    }

    $(document).on({
        ajaxStart: function () {
            onLoadingButton(BTN_LOADING_CLASS);

            @if((!Request::is('admin/factory-orders/*') && !Request::is('admin/orders/*')))
                //DISABLE_AJAX_LOADING was defined in disable-ajax-loading
            if (!(typeof DISABLE_AJAX_LOADING !== 'undefined' && DISABLE_AJAX_LOADING)) {
                onLoadingScreen();
            }

            @endif
        },
        ajaxStop: function () {
            offLoadingButton(BTN_LOADING_CLASS);

            @if((!Request::is('admin/factory-orders/*') && !Request::is('admin/orders/*')))

            if (!(typeof DISABLE_AJAX_LOADING !== 'undefined' && DISABLE_AJAX_LOADING)) {
                offLoadingScreen();
            }

            @endif
        }
    });

    function onLoadingScreen() {
        $("#overlay").fadeIn(300);
    }

    function offLoadingScreen() {
        $("#overlay").fadeOut(300);
    }

    $(function () {
        //Initialize Select2 Elements
        const REST_CODE_FAIL = 0;
        const REST_CODE_SUCCESS = 1;
        var alertHeaderTitle = 'Alert';

        $(".select2-custom").select2({
            dropdownAutoWidth: true,
            width: 'max-content'
        });

        if ($('.selected-lang').length) {
            $('.selected-lang').on('click', function () {
                let langSelected = $(this).attr('data-lang');
                let urlUpdate = $(this).attr('data-url');
                let ajaxOption = {
                    url: urlUpdate,
                    type: 'POST',
                    data: {
                        lang: langSelected
                    },
                    success: function (result) {
                        window.location.reload();
                    },
                    error: function (result) {
                        console.log('Error', result);
                        window.location.reload();
                    }
                };
                $.ajax(ajaxOption);

            })
        }


        if ($('.link-delete').length) {
            $('.link-delete').on('click', function () {
                let deleteObject = $(this);
                let deleteUrl = deleteObject.attr('data-href');
                let messageConfirm = deleteObject.attr('data-message');
                let messageTitle = deleteObject.attr('data-title');
                let rowDataRemoveId = deleteObject.attr('data-row-id');

                let checkDeleteUrl = checkAttrIsExists(deleteUrl, "attr 'data-href' need to be declared")
                if (checkDeleteUrl.status == 0) {
                    popupMsg(checkDeleteUrl.msg, false)
                    return;
                }

                let checkMessageConfirm = checkAttrIsExists(messageConfirm, "attr 'data-message' need to be declared")
                if (checkDeleteUrl.status == 0) {
                    popupMsg(checkMessageConfirm.msg, false)
                    return;
                }

                let checkMessageTitle = checkAttrIsExists(messageTitle, "attr 'data-title' need to be declared");
                if (checkDeleteUrl.status == 0) {
                    popupMsg(checkMessageTitle.msg, false)
                    return;
                }

                let checkRowDataRemoveId = checkAttrIsExists(rowDataRemoveId, "attr 'data-row-id' need to be declared");
                if (checkRowDataRemoveId.status == 0) {
                    popupMsg(checkRowDataRemoveId.msg, false)
                    return;
                }

                $.confirm({
                    title: messageTitle,
                    content: messageConfirm,
                    type: 'red',
                    typeAnimated: true,
                    buttons: {
                        tryAgain: {
                            text: deleteObject.attr('data-btn-confirm'),
                            btnClass: 'btn-red',
                            action: function () {
                                let ajaxOption = {
                                    url: deleteUrl,
                                    type: 'DELETE',
                                    success: function (result) {
                                        if (result.code != 0) {
                                            $(rowDataRemoveId).remove();
                                        }
                                        popupMsg(result.message, false)
                                    },
                                    error: function (result) {
                                        console.log('Error', result);
                                    }
                                };
                                $.ajax(ajaxOption);
                            }
                        },
                        close: {
                            text: deleteObject.attr('data-btn-cancel'),
                            action: function () {
                            }
                        },
                    }
                });
            })
        }


        function checkAttrIsExists(dataAttr, messageAlert) {
            if (typeof dataAttr === 'undefined' || dataAttr.length < 1) {
                return {
                    status: 0,
                    msg: messageAlert
                };

            }

            return {
                status: 1,
                msg: 'OK'
            };
        }

    })
</script>
@stack('scripts')
</body>

</html>
