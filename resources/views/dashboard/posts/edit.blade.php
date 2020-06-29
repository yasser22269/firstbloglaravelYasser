@extends('layouts.dashboard.app')

 @section('title')
 posts Control
@endsection

@section('content')
@component('layouts.dashboard.header')
@slot('nav_title')
    posts Control
@endslot
@endcomponent
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title">Add post</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('posts.update',$posts->id) }}" method="post" enctype="multipart/form-data">
                 {{ method_field('put') }}
                 @include('dashboard.posts.form')

            <button type="submit" class="btn btn-primary pull-right">Edit post</button>
            <div class="clearfix"></div>
        </form>

        </div>
      </div>
    </div>

    <form action="{{ route('updateimage',$posts->id) }}" method="post" enctype="multipart/form-data">
        {{ method_field('put') }}
        {{ csrf_field() }}

    <div class="col-md-12">
        <div class="">
          <label class="">Big_image</label>
          <input type="file"name='Big_image'style="    display: block;
          margin-bottom: 16px;" value="{{ isset($posts) ? $posts->Big_image : '' }}" class="form-control">
          @if ($errors->has('Big_image'))
          <span class="help-block">
              <strong>{{ $errors->first('Big_image') }}</strong>
          </span>
      @endif
        </div>
      </div>
      <div class="col-md-12">
        <div >
          <label >small_image</label>
          <input type="file"name='small_image'style="    display: block;
          margin-bottom: 16px;" value="{{ isset($posts) ? $posts->small_image : '' }}" class="form-control">
          @if ($errors->has('small_image'))
          <span class="help-block">
              <strong>{{ $errors->first('small_image') }}</strong>
          </span>
      @endif
        </div>
      </div>
    </div>

    <button type="submit" class="btn btn-primary pull-right">Edit Image</button>
            <div class="clearfix"></div>
</form>


</div>



@endsection
