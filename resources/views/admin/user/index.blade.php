@extends('admin.layouts.app')
@section('title', 'Users')
@section('content')

    <!-- Start main content -->
    <div class="content user-admin">
        <div class="card flex-1">
            <!-- Search input and button create new -->
            <div class="d-flex px-4 pt-4 pb-4 scrollbarX" style="overflow-x: auto">
                <form action="" method="GET" class="form-inline">
                    <div class="form-group has-feedback has-search">
                        <span class="glyphicon glyphicon-search form-control-feedback"></span>
                        <input type="text" class="form-control"
                               name="search"
                               value="{{request()->get('search')}}"
                               placeholder="User"
                               style="min-width: 150px"/>
                    </div>

{{--                    {{Form::select('role_id', \App\Models\User::rolesArr(), request()->get('role_id'), ['id' => 'role','placeholder' => 'role', 'class' => 'form-control select-field ml-5'])}}--}}
                    <select class="form-control select-field ml-5" name="role_id" id="role">
                        <option value="">--Please choose an option--</option>
                        @foreach($roles as $key => $role)
                        <option value="{{$key}}" @if (request()->get('role_id') == $key) {{ 'selected' }} @endif>{{$role}}</option>
                        @endforeach
                    </select>

                    <a style="height: 35px" type="button" class="btn btn-danger select-field"
                       href="{{route('admin.users.index')}}"><i
                                class="fa fa-redo"></i></a>
                    <button style="height: 35px" type="submit" class="btn btn-warning select-field"><i
                                class="fa fa-filter"></i></button>
                    @hasPermission('admin.users.create')
                    <a href="{{route('admin.users.create')}}" class="btn btn-add ml-auto float-right">
                        <img class="pr-3" style="color: #F78A29;" src="{{asset('backend/icons/icon-add.svg')}}"
                             alt=""/>
                        Create
                    </a>
                    @endhasPermission
                </form>
            </div>

            <!-- Table admin user -->
            <div class="scrollbarX" style="overflow-x: auto">
                <table class="table table-hover">
                    <tr>
                        <th class="text-bold">User name</th>
                        <th class="text-bold">Email</th>
                        <th class="text-bold">Role</th>
                        <th class="text-bold">Action</th>
                    </tr>
                    @php $loginUserId = auth()->user()->id; @endphp
                    @if(empty($users))
                        <tr>
                            <td colspan="5" align="center">Data not found</td>
                        </tr>
                    @else
                        @foreach($users as $item)
                            <tr id="row-{{$item->id}}">
                                <td>{{$item->user_name}}</td>
                                <td>{{$item->email}}</td>
                                <td>{{$item->role_name}}</td>
                                <td>
                                    <div style="white-space: nowrap">
                                        @hasPermission('admin.users.show')
                                        <a class="link-show"
                                           href="{{route('admin.users.show', ['user' => $item->id])}}">View</a>
                                        @endhasPermission

                                        @hasPermission('admin.users.edit')
                                        <a class="link-edit"
                                           href="{{route('admin.users.edit', ['user' => $item->id])}}">Edit</a>
                                        @endhasPermission

                                        @hasPermission('admin.users.destroy')
                                        @if($item->id !== $loginUserId)
                                            <a type="button" data-row-id="#row-{{$item->id}}"
                                               class="link-delete" data-btn-confirm="Confirm"
                                               data-btn-cancel="Cancel"
                                               data-href="{{route('admin.users.destroy', ['user' => $item->id])}}"
                                               data-title="Confirm"
                                               data-message="Delete confirm">Delete</a>
                                        @endif
                                        @endhasPermission
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </table>
                <div style="text-align: right">
                    @if(!empty($users) && $users->count())
                        {!! $users->appends(request()->all())->links("pagination::bootstrap-4") !!}
                    @endif
                </div>

            </div>
        </div>
    </div>
@endsection
