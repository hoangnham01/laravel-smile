@extends('backend.layouts.master')

@section('content')
  <div class="clearfix"></div>
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>
            Form Edit post
          </h2>

          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <br/>
          <form data-parsley-validate method="post" action="{{ route('backend.posts.update', $post->id) }}" class="form-horizontal form-label-left">
            {!! csrf_field() !!}
            <div class="row">
              <div class="col-md-9">
                <div class="form-group">
                  <label>
                    Title <span class="required">*</span>
                  </label>
                  <input type="text" name="title" required="required" value="{{ old('title', $post->title) }}" class="form-control" data-parsley-maxlength="255">
                  {!! formAlertError('title') !!}
                </div>
                <div class="form-group">
                  <label>
                    Slug <span class="required">*</span>
                  </label>
                  <input type="text" name="slug" required="required" value="{{ old('slug', $post->slug) }}" class="form-control" data-parsley-maxlength="255">
                  {!! formAlertError('slug') !!}
                </div>
                <div class="form-group">
                  <label>
                    Content <span class="required">*</span>
                  </label>
                  <textarea name="content" class="tinymce-editor form-control">{{ old('content', $post->content) }}</textarea>
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
                  <label>Category</label>
                  <select name="category_id" class="form-control">
                    <option>{{ trans('common.choose_option') }}</option>
                    @foreach($categories as $item)
                      <option value="{{ $item['id'] }}"
                              @if(old('category_id', $post->category_id) == $item['id']) selected="selected" @endif>{{ $item['mask'] . $item['title'] }}</option>
                    @endforeach
                  </select>
                  {!! formAlertError('category_id') !!}
                </div>
                <div class="control-group">
                  <label>Layout</label>
                  <select name="options_layout" class="form-control">
                    @foreach($layouts as $key => $item)
                      <option value="{{ $key }}"
                              @if(old('options_layout', $post->options->layout) == $key) selected="selected" @endif>{{ $item }}</option>
                    @endforeach
                  </select>
                  {!! formAlertError('category_id') !!}
                </div>
                <div class="control-group">
                  <label>Tags</label>
                  <input type="text" name="tags" class="input-tags form-control" value="{{ old('tags', $post->tags) }}"/>
                </div>
                <div class="form-group">
                  <lable>Thumbnail</lable>
                  <div class="fileinput fileinput-new block" data-provides="fileinput">
                    <div class="fileinput-preview thumbnail" data-trigger="fileinput"></div>
                    <div>
                      <span class="btn btn-default btn-file">
                        <span class="fileinput-new" data-trigger="fileinput">Select image</span>
                        <span class="fileinput-exists">Change</span>
                        <input type="file" name="thumbnail"></span>
                      <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                    </div>
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