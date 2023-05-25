@push('css')
    <style>
        @media screen and (max-width: 826px){
            .form-custom{
                width: 70% ;
            }
        }
        @media screen and (max-width: 768px){
            .form-custom{
                width: 64% ;
            }
        }
        @media screen and (max-width: 912px){
            .form-custom{
                width: 84% ;
            }
        }
        @media screen and (min-width: 991px) and (max-width: 1104px){
            .form-custom{
                width: 75% !important;
            }
        }
        @media screen and (min-width: 765px) and (max-width: 800px){
            .form-custom{
                width: 65% !important;
            }
        }
        @media screen and (min-width: 801px) and (max-width: 855px){
            .form-custom{
                width: 70% !important;
            }
        }
        @media screen and (max-width: 1280px){
            .form-custom{
                width: 85%;
            }
        }
        @media screen and (max-width: 994px){
            .form-custom{
                width: 72% ;
            }
        }
        @media screen and (max-width: 1059px){
            .form-custom{
                width: 80% ;
            }
        }
        @media screen and (max-width: 1212px){
            .form-custom{
                width: 78% ;
            }
        }
        @media screen and (min-width: 991px) and (max-width: 1104px){
            .form-custom{
                width: 75% !important;
            }
        }
        @media screen and (min-width: 1192px) and (max-width: 1272px){
            .form-custom{
                width: 85% ;
            }
        }
        @media screen and (max-width: 1236px){
            .form-custom{
                width: 80% ;
            }
        }
        @media screen and (min-width: 1283px) and (max-width: 1354px){
            .form-custom{
                width: 85% ;
            }
        }
        @media screen and (min-width: 1355px) and (max-width: 1412px){
            .form-custom{
                width: 90% ;
            }
        }
    </style>
@endpush
@extends('admin.layouts.app')
@section('title', transText('change_password'))
@push('css')
@endpush
@section('content')
    <div class="mt-2">
        <div class="container">
            <div>
                <p class="text-center function-title form-custom" style="padding-bottom: 10px">{{transText('change_password')}}</p>

                <form class="form-auth" action="{{route('admin.users.update-password')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <div for="">{{transText('current_password')}}</div>
                        <input type="password" name="current_password" id="" class="form-control form-custom"
                               placeholder=""
                               autofocus/>
                        @include("admin.partial.error-field-v2", with(['column' => 'current_password']))
                    </div>
                    <div class="form-group mt-5">
                        <div for="">{{transText('new_password')}}</div>
                        <input type="password" name="password" id="" class="form-control form-custom" placeholder=""
                               autofocus/>
                        @include("admin.partial.error-field-v2", with(['column' => 'password']))
                    </div>
                    <div class="form-group mt-5">
                        <div for="">{{transText('confirm_password')}}</div>
                        <input type="password" name="password_confirmation" id="" class="form-control form-custom"
                               placeholder=""
                               autofocus/>
                        @include("admin.partial.error-field-v2", with(['column' => 'password_confirmation']))
                    </div>

                    <div class="box-footer text-center form-custom">
                        <button type="submit" class="btn btn-default">
                            {{transButton('save')}}
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
