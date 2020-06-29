@extends('layouts.dashboard.app')

 @section('title')
    Home Page
@endsection
@push('css')
    {{-- <style>
        a{
            color: brown !important;
        }
    </style> --}}
@endpush
@section('content')
     @component('layouts.dashboard.header')
        @slot('nav_title')
            Home Page
        @endslot
    @endcomponent


    <div class="row">
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
              <div class="card-icon">
                <i class="material-icons">User</i>
              </div>
              <p class="card-category">Users</p>
              <h3 class="card-title">{{ $user->count() }}
                <small></small>
              </h3>
            </div>


            <div class="card-footer">
              <div class="stats">
                <a href="{{ route('users.index') }}" class="warning-link">ShowAll</a>
              </div>
            </div>

          </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
              <div class="card-icon">
                <i class="material-icons">store</i>
              </div>
              <p class="card-category">Post</p>
              <h3 class="card-title">{{ $user->count() }}
                <small></small>
              </h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                  <a href="{{ route('posts.index') }}" class="warning-link">ShowAll</a>
                </div>
              </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-danger card-header-icon">
              <div class="card-icon">
                <i class="material-icons">chat</i>
              </div>
              <p class="card-category">category</p>
              <h3 class="card-title">{{ $category->count() }} <small></small></h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                  <a href="{{ route('categories.index') }}" class="warning-link">ShowAll</a>
                </div>
              </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-header card-header-warning card-header-icon">
                <div class="card-icon">
                  <i class="material-icons">store</i>
                </div>
                <p class="card-category">Comments</p>
                <h3 class="card-title">{{ $comment->count() }}
                  <small></small>
                </h3>
              </div>


              <div class="card-footer">
                <div class="stats">
                  <a href="{{ route('comments.index') }}" class="warning-link">ShowAll</a>
                </div>
              </div>

            </div>
          </div>
      </div>

   {{-- @include('back-end.home-sections.statics')
    @include('back-end.home-sections.latest-comments') --}}

@endsection


@push('js')

@endpush
