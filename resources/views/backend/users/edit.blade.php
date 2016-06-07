@extends('backend.layouts.master')

@section('content')
  <div class="clearfix"></div>
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>
            Form Edit user
          </h2>

          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <br/>
          <form id="demo-form2" data-parsley-validate method="post" action="{{ route('backend.users.update', $user->id) }}" class="form-horizontal form-label-left">
            {!! csrf_field() !!}
            <input type="hidden" name="_method" value="put">
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">
                Username <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" name="username" id="username" required="required" value="{{ old('username', $user->username) }}" disabled class="form-control col-md-7 col-xs-12">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">
                Email <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="email" id="email" name="email" required="required" value="{{ old('email', $user->email) }}" class="form-control col-md-7 col-xs-12">
                {!! formAlertError('email') !!}
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="full_name">
                Full name <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="full_name" name="full_name" required="required" value="{{ old('full_name', $user->full_name) }}" class="form-control col-md-7 col-xs-12">
                {!! formAlertError('full_name') !!}
              </div>
            </div>
            <div class="ln_solid"></div>
            <div class="form-group">
              <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <button type="reset" class="btn btn-primary">Cancel</button>
                <button type="submit" class="btn btn-success">Update</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

@stop