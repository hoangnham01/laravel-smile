@extends('backend.layouts.master')

@section('content')

  <div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Users
              <small>List users</small>
            </h2>
            <a href="{{ route('backend.posts.create') }}" class="btn btn-primary pull-right">Create</a>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <div class="row">
              <form method="get">
                <input type="hidden" name="sort" value="{{ request('sort') }}">
                <input type="hidden" name="order" value="{{ request('order') }}">
                <div class="col-sm-6">
                  {!! formPerPage() !!}
                </div>
                <div class="col-sm-6 text-right">
                  <label>Search:
                    <input name="search" type="search" class="form-control input-sm" value="{{ request('search') }}" placeholder="">
                  </label>
                </div>
              </form>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <table class="table table-striped table-bordered smile-table">
                  <thead>
                  <tr>
                    <th class="numerical-order">#</th>
                    <th>Thumbnail</th>
                    <th>Title</th>
                    <th class="text-center">User create</th>
                    <th class="cell-status">Status</th>
                    <th class="cell-action"></th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($posts as $key => $item)
                    <tr>
                      <td class="numerical-order">{{ $_from + $key }}</td>
                      <td class="post-media">
                        <img src="{{ $item->thumbnail }}" alt="">
                      </td>
                      <td>{{ $item->title }}</td>
                      <td>{{ $item->username }}</td>
                      <td class="cell-status">
                        @if($item->status == POST_STATUS_ACTIVATED)
                          <span class="label label-info">{{ trans('common.status.activated') }}</span>
                        @elseif($item->status == POST_STATUS_DEACTIVATED)
                          <span class="label label-warning">{{ trans('common.status.deactivated') }}</span>
                        @elseif($item->status == POST_STATUS_DRAFT)
                          <span class="label label-default">{{ trans('common.status.draft') }}</span>
                        @endif
                      </td>
                      <td class="cell-action">
                        <a class="btn btn-xs" href="{{ route('backend.posts.edit', $item->id) }}">Edit</a>
                      </td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-5">
                {!! showPaginate($posts) !!}
              </div>
              <div class="col-sm-7 text-right">
                {!! $posts->render() !!}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@stop