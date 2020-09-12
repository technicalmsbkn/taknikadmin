@extends('taknikadmin::layouts.app')
@section('bredcrum')
<h5 class="text-dark font-weight-bold my-1 mr-5">Role</h5>
<!--begin::Breadcrumb-->
<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
  <li class="breadcrumb-item">
    <a href="roles" class="text-muted">
     List
    </a>
  </li>
  <li class="breadcrumb-item">
    <a href="{{url('roles/create')}}" class="text-muted">
     Create New
    </a>
  </li>
</ul>
@endsection
@section('content')
<div class="row">
  <div class="col-md-6">
    <!--begin::Portlet-->
    <div class="card card-custom gutter-b">
      <div class="card-header">
        <div class="card-title">
          <h3 class="card-label">
            Details
          </h3>
        </div>
      </div>
        {!! Form::open(
              array(
                'route' => 'roles.store', 
                'class' => 'kt-form',
                'role' =>'form',
                'data-toggle' =>"validator")
              ) !!}
            <div class="card-body">
              <div class="form-group">
                <label for="name">Name<span class="text-danger">*</span></label>
                <input type="text" name="name" id="name" class="form-control" value="{{old('name')}}"  required/>
              </div>
              <div class="form-group">
                <label for="display_name">Display Name<span class="text-danger">*</span></label>
                <input type="display_name" name="display_name" id="display_name" class="form-control" value="{{old('display_name')}}" required/>
              </div>
              <div class="form-group">
                <label for="description">Description(Optional)</label>
                <input type="description" name="description" id="description" class="form-control" value="{{old('description')}}" />
              </div>
              <div class="form-group">
                  <label for="permission_id">Permission<span class="text-danger">*</span></label>
                  <select name="permission_id[]" id="permission_id" class="form-control kt-selectpicker text-capitalize" style="cursor: pointer;" multiple data-live-search="true" required>
                    @foreach ($permissions as $permission)
                      <option value="{{Crypt::encrypt($permission->id)}}">{{$permission->name}}</option>
                    @endforeach
                  </select>
              </div> 
            </div>
            <div class="card-footer d-flex justify-content-between">
              <button type="submit" class="btn btn-primary">Submit</button>
              <button type="reset" class="btn btn-secondary">Cancel</button>
            </div>
        {{Form::close()}}
      <!--end::Form-->
    </div>
    <!--end::Portlet-->
  </div>
</div>
@endsection