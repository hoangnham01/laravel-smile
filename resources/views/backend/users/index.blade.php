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
                    <th>Username</th>
                    <th>Full name</th>
                    <th>Email</th>
                    <th class="cell-status">Status</th>
                    <th class="cell-action"></th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($users as $key => $item)
                    <tr>
                      <td class="numerical-order">{{ $_from + $key }}</td>
                      <td class="user-media">
                        <img src="{{ $item->avatar }}" alt="">
                        <span class="username">{{ $item->username }}</span>
                      </td>
                      <td>{{ $item->full_name }}</td>
                      <td>{{ $item->email }}</td>
                      <td class="cell-status">

                      </td>
                      <td class="cell-action">
                        <a class="btn btn-xs" href=""></a>
                      </td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-5">
                {!! showPaginate($users) !!}
              </div>
              <div class="col-sm-7 text-right">
                {!! $users->render() !!}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@stop