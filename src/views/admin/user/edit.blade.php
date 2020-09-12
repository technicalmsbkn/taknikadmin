@extends('taknikadmin::layouts.app')
@section('bredcrum')
<h5 class="text-dark font-weight-bold my-1 mr-5">
    User
</h5>
<!--begin::Breadcrumb-->
<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
    <li class="breadcrumb-item">
        <a class="text-muted" href="users">
            List
        </a>
    </li>
    <li class="breadcrumb-item">
        <a class="text-muted" href="{{url('users/'.Crypt::encrypt($user->id).'/edit')}}">
            Update
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
      {!! Form::model($user,
        array(
          'method' => 'PATCH',
          'url' =>'users/'.Crypt::encrypt($user->id),
          'class' => 'kt-form',
          'data-toggle'=>"validator")
          ) !!}
          <div class="card-body">
            <div class="form-group">
              <label for="name">
                Name
                <span class="text-danger">
                  *
                </span>
              </label>
              <input class="form-control" id="name" name="name" required type="text" value="{{$user->name}}"/>
            </div>
            <div class="form-group">
              <label for="email">
                E-Mail
                <span class="text-danger">
                  *
                </span>
              </label>
              <input class="form-control" id="email" name="email" required type="text" value="{{$user->email}}"/>
            </div>
            <div class="form-group">
              <label for="mobile">
                Mobile
                <span class="text-danger">
                  *
                </span>
              </label>
              <input class="form-control" id="mobile" name="mobile" required type="mobile" value="{{$user->mobile}}"/>
            </div>
            <div class="form-group">
              <label for="password">
                Password
              </label>
              <div class="input-group">
                <input class="form-control" id="password" name="password" type="password"/>
                <div class="input-group-append">
                  <span class="input-group-text" id="toggle_password" style="cursor:pointer">
                    <i class="fas fa-eye eye" id="eye">
                    </i>
                  </span>
                </div>
              </div>
              <p class="pt-2 text-info">
                If You Want To Change The Password, You Can, Otherwise The Old Password Will Remain
              </p>
            </div>
            <div class=“form-group”>
              <label>Roles<span class="text-danger">*</span></label>
              {{ Form::select('role_id[]',$roles, $role,['class'=>'form-control text-capitalize kt-selectpicker','required'=>'required',"data-live-search"=>"true", 'multiple'=>'multiple']) }}
            </div>
          </div>
          <div class="card-footer d-flex justify-content-between">
            <button class="btn btn-primary" type="submit">
              Submit
            </button>
            <button class="btn btn-secondary" type="reset">
              Cancel
            </button>
          </div>
          {{Form::close()}}
          <!--end::Form-->
          <!--end::Portlet-->
        </div>
      </div>
    </div>
@endsection

@section('js')
<script>
  $('#toggle_password').click(function(){
    let input = $('#password')
    $("#eye").toggleClass("fa-eye fa-eye-slash");
    if(input.attr('type') === 'password')
    {
      input.attr('type','text');
    }else{
      input.attr('type','password');
    }
  });
</script>
@endsection