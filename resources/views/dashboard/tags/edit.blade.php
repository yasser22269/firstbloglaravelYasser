@extends('layouts.dashboard.app')

 @section('title')
 tag Control
@endsection

@section('content')
@component('layouts.dashboard.header')
@slot('nav_title')
    tag Control
@endslot
@endcomponent
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title">Add tag</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('tags.update',$rows->id) }}" method="post">
                 {{ method_field('put') }}
                 @include('dashboard.tags.form')

            <button type="submit" class="btn btn-primary pull-right">Edit tag</button>
            <div class="clearfix"></div>
        </form>

        </div>
      </div>
    </div>

</div>
@endsection
