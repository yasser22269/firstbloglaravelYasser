@extends('layouts.dashboard.app')

 @section('title')
 comments Control
@endsection

@section('content')
     @component('layouts.dashboard.header')
        @slot('nav_title')
            comments Control
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Add Comment</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('comments.store') }}" method="post">
                   @include('dashboard.comments.form')
                <button type="submit" class="btn btn-primary pull-right">Add Comment</button>
                <div class="clearfix"></div>
            </form>

            </div>
          </div>
        </div>

    </div>

@endsection

