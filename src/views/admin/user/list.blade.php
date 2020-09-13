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
        <div class="card-toolbar">
            <a class="btn btn-sm btn-success font-weight-bold" href="users/create">
                <i class="la la-plus">
                </i>
                Add New
            </a>
        </div>
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
                        Actions
                    </th>
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
                    <td nowrap="">
                        <div style="display: flex; justify-content: center;">
                            <a class="btn btn-sm btn-clean btn-icon btn-icon-md" href="{{url('users/'.Crypt::encrypt($user->id).'/edit')}}" title="Edit">
                                <i class="la la-edit">
                                </i>
                            </a>
                            {{Form::open([ 'method'  => 'delete', 'route' => [ 'users.destroy', Crypt::encrypt($user->id) ],'onsubmit'=>"delete_confirm()"])}}
                            <button class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Delete">
                                <i class="la la-trash">
                                </i>
                            </button>
                            {{Form::close()}}
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <!--end: Datatable -->
    </div>
</div>
@endsection
