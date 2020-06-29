@extends('layouts.dashboard.app')

 @section('title')
 tags Control
@endsection

@section('content')
     @component('layouts.dashboard.header')
        @slot('nav_title')
            tags Control
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Add tag</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('tags.store') }}" method="post">
                   @include('dashboard.tags.form')
                <button type="submit" class="btn btn-primary pull-right">Add tag</button>
                <div class="clearfix"></div>
            </form>

            </div>
          </div>
        </div>

    </div>

@endsection

