@extends('layouts.app')
@section('title','Contact')
@section('content')

<!-- page-title -->
<section class="section bg-secondary">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h4>Fashion</h4>
        </div>
      </div>
    </div>
  </section>
  <!-- /page-title -->

  <!-- category post -->
  <section>
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="row masonry-container pt-5">

            @foreach ($posts as $post)
            <div class="col-sm-6 mb-5">
              <article class="text-center">
                <img class="img-fluid mb-4" src="{{ asset('images/small_image/'. $post->small_image) }}" alt="post-thumb">
                <p class="text-uppercase mb-2">{{  $post->name }}</p>
                <h4 class="title-border">{{ $post->title }}</h4>
                @php
                $likecount =0;
                $dislikecount =0;
                $likestyle ='btn-secondary';
                $dislikestyle ='btn-secondary';

            @endphp
            @foreach ($post->likes as $like)

                @php
                    if($like->like  == 1)
                        $likecount++;

                    if($like->like  == 0)
                        $dislikecount++;
                    if(Auth::check()){

                    if($like->like  == 1 && $like->user_id == Auth::user()->id ){
                            $likestyle ='btn-success';
                        }

                    if($like->like  == 0 && $like->user_id == Auth::user()->id){

                            $dislikestyle ='btn-danger';
                        }
                    }

                @endphp

            @endforeach

            @if(Auth::check())


            <span data-postid="{{  $post->id  }}_l"  data-like="{{ $likestyle }}" type='button'  class="like  btn {{ $likestyle }}" style="padding-right: 30px;cursor: pointer;"> <i class="fas fa-thumbs-up" ></i> <span class="count_like">{{  $likecount }}</span></span>

               <span data-postid="{{  $post->id  }}_d" type='button' data-dislike="{{ $dislikestyle }}" class="dislike btn {{ $dislikestyle  }}"style="cursor: pointer;"> <i class="fas fa-thumbs-down"></i>  <span class="count_dislike">{{ $dislikecount }} </span> </span>

            @endif


                <p>  {{ substr($post->body,0,150)  }}{{ strlen($post->body)> 150 ? "....." :'' }}</p>
                <a href="{{ url('front/postShow/'.$post->id) }}" class="btn btn-transparent">read more</a>
              </article>
            </div>
            @endforeach
          </div>
          <div class="row">
            <div class="col-12">
              <nav>
                <ul class="pagination justify-content-center align-items-center">
                    {!!  $posts->links() !!}

              </ul>
              </nav>
            </div>
          </div>
        </div>
        <!-- /blog post -->
        <div class="col-lg-4">
          <div class="widget search-box">
            <i class="ti-search"></i>
            <input type="search" id="search-post" class="form-control border-0 pl-5" name="search-post"
              placeholder="Search">
          </div>
          <div class="widget">
            <h6 class="mb-4">LATEST POST</h6>
            @foreach ($posts_left as $posts)

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
                @foreach ($tags as $tag)
                <li class="list-inline-item m-1"><a href="#">{{ $tag->name }}</a></li>
                {{-- <a href="blog-single.html">ui ux</a> --}}
              @endforeach
            </ul>
          </div>
          <div class="widget">
            <h6 class="mb-4">CATEGORIES</h6>
            <ul class="list-inline tag-list">
                @foreach ($categories as $category)

                <li class="list-inline-item m-1"><a href="#">{{ $category->name }}</a></li>
                @endforeach

            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /category post -->
@endsection
