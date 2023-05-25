@push('css')
    <style>
        /*.select2-container--default .select2-selection--single, .select2-selection .select2-selection--single {*/
        /*    width: 790px !important;*/
        /*}*/
        /*@media only screen and (max-width: 1440px) {*/
        /*    .select2-container--default .select2-selection--single, .select2-selection .select2-selection--single {*/
        /*        width: 550px !important;*/
        /*    }*/
        /*}*/
    </style>
@endpush
@extends('admin.layouts.app')
@section('title', 'User')
@section('content')
    <!-- Start main content -->
    <div class="content user-admin-add-new">
        <a class="btn-back-previous btn btn-default" href="{{ route('admin.users.index') }}">
            <img src="{{asset('backend/icons/icon-back-page.svg')}}"
                 alt=""/><span> Back to previous</span>
        </a>
        <div class="">

            <div class="function-title text-center">
                <p class="text-title">User</p>
            </div>

            <div class="d-flex justify-content-center">
                <!-- Form add new admin -->
                {{Form::open(['url' => route('admin.users.update', ['user' => $user->id]), 'method' => 'PUT', 'class' => 'form-add-admin'])}}
                <div class="mt-4 row gutter-40 justify-content-between">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="label-bold" for="fullName">Full name*</label>
                            <input name="full_name" type="text" class="form-control big" id="fullName"
                                   value="{{old('full_name', $user->full_name)}}"
                                   placeholder="Full name"/>
                            @include("admin.partial.error-field-v2", with(['column' => 'full_name']))
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="label-bold" for="Username">User name*</label>
                            <input name="user_name" type="text" class="form-control big" id="Username"
                                   value="{{old('user_name', $user->user_name)}}"
                                   placeholder="User name"/>
                            @include("admin.partial.error-field-v2", with(['column' => 'user_name']))
                        </div>
                    </div>
                </div>

                <div class="mt-4 row gutter-40 justify-content-between">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="label-bold" for="password">Password*</label>
                            <input name="password" type="password" class="form-control big" id="password"
                                   value="{{old('password')}}"
                                   placeholder="Password"/>
                            @include("admin.partial.error-field-v2", with(['column' => 'password']))
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="label-bold"
                                   for="confirmPassword">Confirm password*</label>
                            <input name="password_confirmation" type="password" class="form-control big"
                                   value="{{old('password_confirmation')}}"
                                   id="confirmPassword" placeholder="Confirm password"/>
                            @include("admin.partial.error-field-v2", with(['column' => 'password_confirmation']))
                        </div>
                    </div>
                </div>
                <div class="mt-5 row gutter-40 justify-content-between">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="label-bold" for="phone">Phone</label>
                            <input name="phone" id="phone" type="number" class="form-control big"
                                   value="{{old('phone', $user->phone)}}"
                                   placeholder="Phone"/>
                            @include("admin.partial.error-field-v2", with(['column' => 'phone']))
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="label-bold" for="email">Email</label>
                            <input name="email" type="email" class="form-control big" id="email"
                                   placeholder="Email" value="{{old('email', $user->email)}}"/>
                            @include("admin.partial.error-field-v2", with(['column' => 'email']))
                        </div>
                    </div>
                </div>
                <div class="mt-5 row gutter-40 justify-content-between">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="label-bold" for="role">Role*</label><br>
                            {{Form::select('role_id', \App\Models\User::rolesArr(), old('role_id', $user->role_id), ['id' => 'role','placeholder' => 'Role', 'class' => 'form-control big custom-select'])}}
                            @include("admin.partial.error-field-v2", with(['column' => 'role_id']))
                        </div>
                    </div>
                </div>


                <div class="box-footer text-center">
                    <button type="submit" class="btn btn-default">
                        Save
                    </button>
                </div>
                {{Form::close()}}
            </div>
        </div>
    </div>

    <!-- End main content -->
@endsection
@push('scripts')
    <script src="{{ asset('backend/admin/js/user/create.js') }}"></script>
@endpush