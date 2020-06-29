@extends('layouts.dashboard.app')

 @section('title')
 Users Control
@endsection

@section('content')
     @component('layouts.dashboard.header')
        @slot('nav_title')
            Users Control
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Add User</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('users.store') }}" method="post">
                   @include('dashboard.users.form')
                <button type="submit" class="btn btn-primary pull-right">Add User</button>
                <div class="clearfix"></div>
            </form>

            </div>
          </div>
        </div>

    </div>

@endsection

