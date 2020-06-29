@extends('layouts.app')
@section('title','search')
@section('content')
<section class="section">
  <!-- page-title -->
<section class="section bg-secondary">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h4>Search Result</h4>
        </div>
      </div>
    </div>
  </section>
  <!-- /page-title -->

  <!-- search result -->
  <section class="section">
    <div class="container">
      <div class="row">
        <div class="col-lg-10 mx-auto">
          <ul class="list-unstyled">

              @foreach ($posts as $post)
            <li class="border-bottom mb-4 pb-3">
              <h4><a href="#" class="text-dark">{{ $post->name }}</a></h4>
              <p>{{ date( 'M j,Y h:ia ', strtotime($post->created_at) ) }}</p>
              <p>{{ $post->body }}</p>
              <a href="{{ url('front/postShow/'.$post->id) }}" class="btn btn-transparent pl-0">Read More</a>
            </li>
            @endforeach

          </ul>
        </div>
      </div>
    </div>
  </section>
  <!-- /search result -->
  </section>

@endsection



