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
                <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">

                    {{ csrf_field() }}
<div class="row">
  <div class="col-md-12">
    <div class="form-group bmd-form-group">
      <label class="bmd-label-floating">Name</label>
      <input type="text"Name='name' value="{{ isset($posts) ? $posts->name : '' }}" class="form-control">
      @if ($errors->has('name'))
      <span class="help-block">
          <strong>{{ $errors->first('name') }}</strong>
      </span>
  @endif
    </div>
  </div>

  <div class="col-md-12">
    <div class="form-group bmd-form-group">
      <label class="bmd-label-floating">Title</label>
      <input type="text"name='title' value="{{ isset($posts) ? $posts->title : '' }}" class="form-control">
      @if ($errors->has('title'))
      <span class="help-block">
          <strong>{{ $errors->first('title') }}</strong>
      </span>
  @endif
    </div>
  </div>
  <div class="col-md-12">
      <div class="form-group bmd-form-group">
          <label class="bmd-label-floating">body</label>
          <textarea name="body"  cols="30" rows="5" class="form-control ">
              {{ isset($posts) ? $posts->body : '' }}</textarea>
          @if ($errors->has('body'))
          <span class="help-block">
              <strong>{{ $errors->first('body') }}</strong>
          </span>
      @endif
      </div>
  </div>
  <div class="col-md-12">
    <div class="form-group bmd-form-group">
      <label class="bmd-label-floating">category</label>
      <select class="form-control" name="category_id" >
        <option style="background: #202940; padding-left: 18px !important;" >category select</option>
          @foreach ($categories as $category)
          {{-- {{ $posts->category_id == $category->id ? 'selected' : ''}} --}}
        <option style="background: #202940;" value="{{ $category->id }}"
            >{{  $category->name }}</option>
        @endforeach
    </select>
      @if ($errors->has('category'))
      <span class="help-block">
          <strong>{{ $errors->first('category_id') }}</strong>
      </span>
  @endif
    </div>
    <div class="form-group bmd-form-group">
        <label class="bmd-label-floating">Tags</label>
        <select multiple class="form-control" name="tags[]" style="    height: 100px;">
            @foreach ($tags as $tag)
            <option   value="{{ $tag->id }}">{{  $tag->name }}</option>
        @endforeach
        </select>
        @if ($errors->has('category'))
        <span class="help-block">
            <strong>{{ $errors->first('category_id') }}</strong>
        </span>
    @endif
      </div>
  </div>
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




                <button type="submit" class="btn btn-primary pull-right">Add post</button>
                <div class="clearfix"></div>
            </form>

            </div>
          </div>
        </div>

    </div>

@endsection

