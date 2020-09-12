@extends('taknikadmin::layouts.app')

@section('bredcrum')
<h5 class="text-dark font-weight-bold my-1 mr-5">
    Users
</h5>
<!--begin::Breadcrumb-->
<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
    <li class="breadcrumb-item">
        <a class="text-muted" href="users">
            List
        </a>
    </li>
</ul>
@endsection

@section('content')
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            <span class="card-icon">
                <i class="flaticon2-chat-1 text-primary">
                </i>
            </span>
            <h3 class="card-label">
                List
            </h3>
        </div>
        @ability('admin','create-user')
        <div class="card-toolbar">
            <a class="btn btn-sm btn-success font-weight-bold" href="users/create">
                <i class="la la-plus">
                </i>
                Add New
            </a>
        </div>
        @endability
    </div>
    <div class="card-body">
        <!--begin: Datatable -->
        <table class="table table-separate text-capitalize table-head-custom table-checkable text-center" id="kt_datatable1">
            <thead>
                <tr>
                    <th>
                        #
                    </th>
                    <th>
                        Name
                    </th>
                    <th>
                        E-Mail
                    </th>
                    <th>
                        Mobile
                    </th>
                    <th>
                        Role
                    </th>
                    <th>
                        Status
                    </th>
                    @ability('admin','edit-user,delete-user')
                    <th>
                        Actions
                    </th>
                    @endability
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>
                        {{$loop->iteration}}
                    </td>
                    <td>
                        {{$user->name}}
                    </td>
                    <td class="text-lowercase">
                        {{$user->email}}
                    </td>
                    <td class="text-lowercase">
                        {{$user->mobile}}
                    </td>
                    <td>
                        @foreach($user->role as $role)
                        	{{$role->name}}
                        @endforeach
                    </td>
                    <td>
                        @if($user->status==0)
                        <a href="{{url('users/status/'.Crypt::encrypt($user->id).'/'.Crypt::encrypt(1))}}">
                            <span class="text-success font-weight-bold">
                                Click to active
                            </span>
                        </a>
                        @else
                        <a href="{{url('users/status/'.Crypt::encrypt($user->id).'/'.Crypt::encrypt(0))}}">
                            <span class="text-danger font-weight-bold">
                                Click to deactive
                            </span>
                        </a>
                        @endif
                    </td>
                    @ability('admin','edit-user,delete-user')
                    <td nowrap="">
                        <div style="display: flex; justify-content: center;">
                            @ability('admin','edit-user')
                            <a class="btn btn-sm btn-clean btn-icon btn-icon-md" href="{{url('users/'.Crypt::encrypt($user->id).'/edit')}}" title="Edit">
                                <i class="la la-edit">
                                </i>
                            </a>
                            @endability
                            @ability('admin','delete-user')
                            {{Form::open([ 'method'  => 'delete', 'route' => [ 'users.destroy', Crypt::encrypt($user->id) ],'onsubmit'=>"delete_confirm()"])}}
                            <button class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Delete">
                                <i class="la la-trash">
                                </i>
                            </button>
                            {{Form::close()}}
                            @endability
                        </div>
                    </td>
                    @endability
                </tr>
                @endforeach
            </tbody>
        </table>
        <!--end: Datatable -->
    </div>
</div>
@endsection
