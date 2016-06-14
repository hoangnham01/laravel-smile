@extends('backend.layouts.master')

@section('content')
  <div class="clearfix"></div>
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>
            Form Create post
          </h2>

          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <br/>
          <form id="demo-form2" data-parsley-validate method="post" action="{{ route('backend.posts.store') }}"
                class="form-horizontal form-label-left">
            {!! csrf_field() !!}
            <div class="row">
              <div class="col-md-9">
                <div class="form-group">
                  <label>
                    Title <span class="required">*</span>
                  </label>
                  <input type="text" name="title" required="required" value="{{ old('title') }}" class="form-control"
                         data-parsley-maxlength="255">
                  {!! formAlertError('title') !!}
                </div>
                <div class="form-group">
                  <label>
                    Slug <span class="required">*</span>
                  </label>
                  <input type="text" name="slug" required="required" value="{{ old('slug') }}" class="form-control"
                         data-parsley-maxlength="255">
                  {!! formAlertError('slug') !!}
                </div>
                <div class="form-group">
                  <label>
                    Content <span class="required">*</span>
                  </label>
                  <textarea name="content" class="tinymce-editor form-control">{{ old('content') }}</textarea>
                  {!! formAlertError('content') !!}
                </div>
                <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-xs-12">
                    <button type="reset" class="btn btn-primary">Cancel</button>
                    <button type="submit" class="btn btn-success">Submit</button>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="control-group">
                  <label class="control-labelcol-xs-12">Tags</label>
                  <div class="col-xs-12">
                    <input type="text" name="tags" class="input-tags form-control" value="social, adverts, sales" />
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

@stop