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
@section('title', 'Show user')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <!-- Start main content -->
            <div class="content user-admin-add-new">
                <a class="btn-back-previous btn btn-default" href="{{ route('admin.users.index') }}">
                    <img src="{{asset('backend/icons/icon-back-page.svg')}}" alt=""/><span> Back to previous</span>
                </a>
                <div class="card mt-4 p-5 flex-1">
                    <div class="text-center function-title">
                        <p class="text-title">Show user</p>
                    </div>

                    <div class="d-flex justify-content-center">
                        <!-- Form add new admin -->
                        <div class="form-add-admin">


                            <div class="mt-4 row gutter-40 justify-content-between">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="label-bold" for="fullName">Full name*</label>
                                        <input name="full_name" type="text" class="form-control big" readonly
                                               id="fullName" value="{{old('full_name', $user->full_name)}}"
                                               placeholder="Full name"/>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="label-bold" for="Username">User name*</label>
                                        <input name="user_name" type="text" class="form-control big" id="Username"
                                               readonly value="{{old('user_name', $user->user_name)}}"
                                               placeholder="User name"/>
                                        @include("admin.partial.error-field-v2", with(['column' => 'user_name']))
                                    </div>
                                </div>
                            </div>

                            <div class="mt-5 row gutter-40 justify-content-between">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="label-bold" for="phone">Phone</label>
                                        <input name="phone" id="phone" type="tel" class="form-control big" readonly
                                               value="{{old('phone', $user->phone)}}"
                                               placeholder="Phone"/>
                                        @include("admin.partial.error-field-v2", with(['column' => 'mobile_number']))
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="label-bold" for="email">Email</label>
                                        <input name="email" type="email" class="form-control big" id="email"
                                               placeholder="Email" readonly
                                               value="{{old('email', $user->email)}}"/>
                                        @include("admin.partial.error-field-v2", with(['column' => 'email']))
                                    </div>
                                </div>
                            </div>
                            <div class="mt-5 row gutter-40 justify-content-between">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="label-bold" for="role">Role*</label>
{{--                                        {{Form::select('role_id', \App\Models\User::rolesArr(), old('role_id', $user->role_id), ['id' => 'role','placeholder' => 'role', 'class' => 'form-control big custom-select', 'readonly' => true])}}--}}
                                        <select class="form-control big custom-select" name="role_id" id="role" disabled="true">
                                            @foreach(\App\Models\User::rolesArr() as $key => $role)
                                                <option value="{{$key}}" @if (request()->get('role_id') == $key || $user->role_id == $key)  {{ 'selected' }} @endif>{{$role}}</option>
                                            @endforeach
                                        </select>
                                        @include("admin.partial.error-field-v2", with(['column' => 'role_id']))
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!-- End main content -->
        </div>
    </div>
@endsection
@push('css')
@endpush
@push('scripts')
@endpush
