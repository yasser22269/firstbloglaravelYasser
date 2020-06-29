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


    <div class="col-lg-12 col-md-12">
        <div class="card">

            <div class="card-header card-header-primary">
                <div class="row">
                    <div class="col-md-8">
                        <h4 class="card-title"> posts Control</h4>
                      </div>
                      <div class="col-md-4 text-right">
                        {{-- {{ route('posts.create') }} --}}
                        <a href="{{ route('posts.create') }}" class="btn btn-white btn-round">Add post</a>

                        </div>
                </div>

             </div>

          <div class="card-body table-responsive">
            <table class="table table-hover">
              <thead class="text-warning">
                <tr>
                    <th>
                        ID
                    </th>
                    <th>
                        name
                    </th>
                    <th>
                        title
                    </th>
                    <th>
                        body
                    </th>
                    <th>
                        Big_image
                    </th>
                    <th>
                        small_image
                    </th>
                    <th>
                        post
                    </th>
                    <th >
                        control
                    </th>
              </tr>
            </thead>
              <tbody>
                @foreach($rows as $post)
                <tr>
                    <td>
                        {{ $post->id }}
                    </td>
                    <td>
                        {{ $post->name }}
                    </td>
                    <td>
                        {{ $post->title }}
                    </td>
                    <td>
                        {{ substr($post->body,0,50)  }}{{ strlen($post->body)> 50 ? "....." :'' }}
                    </td>
                    <td>
                        <img src="{{ asset('images/Big_image/'.$post->Big_image)   }}"style='width:100px'class='img-thumbnail' alt="">

                    </td>
                    <td>
                        <img src="{{ asset('images/small_image/'.$post->small_image)   }}"style='width:100px'class='img-thumbnail' alt="">
                    </td>
                    <td>
                        {{ $post->users->name }}
                    </td>
                    <td class="td-actions ">
                        {{-- {{ route('posts.edit',['id'=> $post]) }} --}}
                    <a href="{{ route('posts.edit',$post->id) }}">
                        <button type="button" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" data-original-title="Edit post">
                            <i class="material-icons">edit</i>
                          </button>
                    </a>
                        <form action="{{ route('posts.destroy',$post->id) }}" method="post" style="display: inline-block;">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                        <button  type="submit" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" data-original-title="Remove post">
                          <i class="material-icons">close</i>
                        </button>
                        </form>


                      </td>
                </tr>
            @endforeach
              </tbody>
            </table>
            {!! $rows->links() !!}
          </div>
        </div>
      </div>
@endsection

