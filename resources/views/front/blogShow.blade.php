@extends('layouts.app')
@section('title','HomePage')
@section('content')

<!-- page-title -->
<section class="section bg-secondary">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h4>As a Designer, I Refuse to Call People ‘Users’</h4>
        </div>
      </div>
    </div>
  </section>
  <!-- /page-title -->

  <!-- blog single -->
  <section>
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <ul class="list-inline d-flex justify-content-between py-3">
            <li class="list-inline-item"><i class="ti-user mr-2"></i>Post by {{ $posts->users->name }}</li>
            <li class="list-inline-item"><i class="ti-calendar mr-2"></i>{{ date("M j,Y h:i a ",strtotime($posts->created_at) )  }}</li>
          </ul>
          <img src="{{  asset('images/Big_image/'. $posts->Big_image ) }}" alt="post-thumb" class="w-100 img-fluid mb-4">
          <div class="content">

            <p>{{ $posts->body }}</p>

            <blockquote>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
              labore
              et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
              aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
            </blockquote>

            <img src="{{  asset('images/small_image/'. $posts->small_image ) }}" alt="image" class="img-fluid">
            <p>{{ $posts->body }}</p>

          </div>
        </div>
        <div class="col-lg-4">
          <div class="widget search-box">
            <i class="ti-search"></i>
            <input type="search" id="search-post" class="form-control border-0 pl-5" name="search-post"
              placeholder="Search">
          </div>
          <div class="widget">
            <h6 class="mb-4">LATEST POST</h6>

            @foreach ($posts_top as $posts)

            <div class="media mb-4">
              <div class="post-thumb-sm mr-3">
                <img class="img-fluid" src="{{  asset('images/small_image/'. $posts->small_image ) }}" alt="post-thumb">
              </div>
              <div class="media-body">
                <ul class="list-inline d-flex justify-content-between mb-2">
                  <li class="list-inline-item">Post By {{ $posts->users->name }}</li>
                  <li class="list-inline-item"> {{ date("M j,Y h:i a ",strtotime($posts->created_at) )  }}</li>
                </ul>
                <h6><a class="text-dark" href="{{ url("front/postShow/ ".$posts->id) }}">{{substr($posts->body,0,50)  }}</a></h6>
              </div>
            </div>
            @endforeach


          </div>
          <div class="widget">
            <h6 class="mb-4">TAG</h6>
            <ul class="list-inline tag-list">
                @foreach ($posts->tags as $tag)
              <li class="list-inline-item m-1"><a href="#">{{ $tag->name }}</a></li>
              {{-- <a href="blog-single.html">ui ux</a> --}}
            @endforeach

            </ul>
          </div>
          <div class="widget">
            <h6 class="mb-4">CATEGORIES</h6>
            <ul class="list-inline tag-list">
            <li class="list-inline-item m-1"><a href="#">{{ $posts->categories->name }}</a></li>
               {{-- <a href="blog-single.html">ui ux</a> --}}
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /blog single -->



@endsection
