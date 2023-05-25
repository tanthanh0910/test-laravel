@extends('admin.layouts.app')
@section('title', 'User')
@section('content')
    <div class="row">
        <div class="col-lg-12">
        <!-- Start main content -->
            <div class="content user-admin-add-new">
                <a class="btn-back-previous btn btn-default" href="{{ route('admin.users.index') }}">
                    <img src="{{asset('backend/icons/icon-back-page.svg')}}"
                         alt=""/><span> Back to previous</span>
                </a>
                <div class="card mt-4 p-5 flex-1">
                    <div class="function-title text-center">
                        <p class="text-title">User</p>
                    </div>

                    <div class="d-flex justify-content-center">
{{--                        <input type="hidden" name="role_super_admin" value="{{\App\Models\User::ROLE_SUPER_ADMIN}}">--}}
{{--                        <input type="hidden" name="role_admin" value="{{\App\Models\User::ROLE_ADMIN}}">--}}
{{--                        <input type="hidden" name="role_outlet_staff"--}}
{{--                               value="{{\App\Models\User::ROLE_OUTLET_STAFF}}">--}}
{{--                        <input type="hidden" name="role_outlet_owner"--}}
{{--                               value="{{\App\Models\User::ROLE_OUTLET_OWNER}}">--}}
{{--                        <input type="hidden" name="role_factory_staff"--}}
{{--                               value="{{\App\Models\User::ROLE_FACTORY_STAFF}}">--}}
                        <!-- Form add new admin -->
                        {{Form::open(['url' => route('admin.users.store'), 'method' => 'POST', 'class' => 'form-add-admin'])}}
                        <div class="mt-4 row gutter-40 justify-content-between">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="label-bold" for="fullName">Full name*</label>
                                    <input name="full_name" type="text" class="form-control big" id="fullName"
                                           value="{{old('full_name')}}"
                                           placeholder="Full name"/>
                                    @include("admin.partial.error-field-v2", with(['column' => 'full_name']))
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="label-bold" for="Username">User name*</label>
                                    <input name="user_name" type="text" class="form-control big" id="Username"
                                           value="{{old('user_name')}}"
                                           placeholder="Username"/>
                                    @include("admin.partial.error-field-v2", with(['column' => 'user_name']))
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 row gutter-40 justify-content-between">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="label-bold" for="password">password*</label>
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
                                           value="{{old('phone')}}"
                                           placeholder="Phone"/>
                                    @include("admin.partial.error-field-v2", with(['column' => 'phone']))
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="label-bold" for="email">Email</label>
                                    <input name="email" type="email" class="form-control big" id="email"
                                           placeholder="Email" value="{{old('email')}}"/>
                                    @include("admin.partial.error-field-v2", with(['column' => 'email']))
                                </div>
                            </div>
                        </div>
                        <div class="mt-5 row gutter-40 justify-content-between">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="label-bold" for="role">Role*</label><br>
                                    {{Form::select('role_id', \App\Models\User::rolesArr(), old('role_id'), ['id' => 'role','placeholder' => 'role', 'class' => 'form-control big custom-select'])}}
                                    @include("admin.partial.error-field-v2", with(['column' => 'role_id']))
                                </div>
                            </div>

                        </div>

                        <div class="box-footer text-center">
                            <button type="submit" class="btn btn-default">
                                Create
                            </button>
                        </div>
                        {{Form::close()}}
                    </div>
                </div>
            </div>

            <!-- End main content -->
        </div>
    </div>
@endsection
@push('scripts')
@endpush