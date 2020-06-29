@extends('layouts.app')
@section('title','HomePage')
@section('content')

          <!-- hero area -->
          <section class="hero-section">
            <div class="container">
              <div class="row">
                <div class="col-lg-6 align-self-end">
                  <h1 class="mb-0">Welcome</h1>
                  <h2 class="mb-100 title-border-lg">to <i>Yasser Blog</i></h2>
                  <p class="mb-80 mr-5">I’m a Full Stack web developer in Egypt. Focusing across branding and
                    identity, digital and
                    print.</p>
                  <span class="font-secondary text-dark mr-3 mr-sm-5">Follow</span>
                  <ul class="list-inline d-inline-block mb-5">
                    <li class="list-inline-item mx-3"><a href="#" class="text-dark"><i class="ti-facebook"></i></a></li>
                    <li class="list-inline-item mx-3"><a href="#" class="text-dark"><i class="ti-twitter-alt"></i></a></li>
                    <li class="list-inline-item mx-3"><a href="#" class="text-dark"><i class="ti-linkedin"></i></a></li>
                    <li class="list-inline-item mx-3"><a href="#" class="text-dark"><i class="ti-github"></i></a></li>
                  </ul>
                </div>
                <div class="col-lg-6 text-right">
                  <img class="img-fluid" src="{{ asset('front/images/banner-img.png')}}" alt="banner-image">
                </div>
              </div>
            </div>
          </section>
          <!-- /hero area -->

        <!-- featured post -->
<section>
    <div class="container-fluid p-sm-0">
      <div class="row featured-post-slider">
          @foreach ($posts_top as $post)

                <div class="col-lg-3 col-sm-6 mb-2 mb-lg-0 px-1">
                <article class="card bg-dark text-center text-white border-0 rounded-0">
                    <img class="card-img rounded-0 img-fluid w-100" src="{{ asset('images/small_image/'. $post->small_image) }}" alt="post-thumb">
                    <div class="card-img-overlay">
                    <div class="card-content">
                        <p class="text-uppercase">{{ $post->name }}</p>
                        <h4 class="card-title mb-4">{{ $post->title }}</h4>
                        <a class="btn btn-outline-light" href="{{ url('front/postShow/'.$post->id) }}">read more</a>
                    </div>
                    </div>
                </article>
                </div>
        @endforeach

      </div>
    </div>
  </section>
  <!-- /featured post -->


  <!-- blog post -->
<section class="section">


    <div class="container">
      <div class="row masonry-container">
        @foreach ($posts as $post)
        <div class="col-lg-4 col-sm-6 mb-5">
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

      {{-- {{ $post->links() }} --}}
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
  </section>
  <!-- /blog post -->

@endsection
