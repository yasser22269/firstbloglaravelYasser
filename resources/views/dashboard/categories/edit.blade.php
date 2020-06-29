@extends('layouts.dashboard.app')

 @section('title')
 categories Control
@endsection

@section('content')
@component('layouts.dashboard.header')
@slot('nav_title')
    categories Control
@endslot
@endcomponent
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title">Add category</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('categories.update',$rows->id) }}" method="post">
                 {{ method_field('put') }}
                 @include('dashboard.categories.form')

            <button type="submit" class="btn btn-primary pull-right">Edit category</button>
            <div class="clearfix"></div>
        </form>

        </div>
      </div>
    </div>

</div>
@endsection
