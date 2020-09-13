@extends('taknikadmin::layouts.app')

@section('bredcrum')
<h5 class="text-dark font-weight-bold my-1 mr-5">
    Roles
</h5>
<!--begin::Breadcrumb-->
<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
    <li class="breadcrumb-item">
        <a class="text-muted" href="roles">
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
            <a class="btn btn-sm btn-success font-weight-bold" href="roles/create">
                <i class="la la-plus">
                </i>
                Add New
            </a>
        </div>
    <div class="card-body">
        <!--begin: Datatable -->
        <table class="table table-separate table-head-custom text-capitalize table-checkable text-center" id="kt_datatable1">
            <thead>
                <tr>
                    <th>
                        #
                    </th>
                    <th>
                        Name
                    </th>
                    <th>
                        Display Name
                    </th>
                    <th>
                    	Permission
                    </th>
                    <th>
                        Description
                    </th>
                    <th>
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($roles as $role)
                <tr>
                    <td>
                        {{$loop->iteration}}
                    </td>
                    <td>
                        {{$role->name}}
                    </td>
                    <td>
                        {{$role->display_name}}
                    </td>
                    <td>
                    	@foreach($role->permission as $permission)
                    		{{$permission->name}}
                    	@endforeach
                    </td>
                    <td>
                        {{$role->description}}
                    </td>
                    <td nowrap="">
                        <div style="display: flex; justify-content: center;">
                            <a class="btn btn-sm btn-clean btn-icon btn-icon-md" href="{{url('roles/'.Crypt::encrypt($role->id).'/edit')}}" title="Edit">
                                <i class="la la-edit">
                                </i>
                            </a>
                            {{Form::open([ 'method'  => 'delete', 'route' => [ 'roles.destroy', Crypt::encrypt($role->id) ],'onsubmit'=>"delete_confirm()"])}}
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
