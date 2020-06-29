@extends('layouts.dashboard.app')

 @section('title')
 comments Control
@endsection

@section('content')
     @component('layouts.dashboard.header')
        @slot('nav_title')
            comments Control
        @endslot
    @endcomponent


    <div class="col-lg-12 col-md-12">
        <div class="card">

            <div class="card-header card-header-primary">
                <div class="row">
                    <div class="col-md-8">
                        <h4 class="card-title"> comments Control</h4>
                      </div>
                      <div class="col-md-4 text-right">
                        {{-- {{ route('comments.create') }} --}}
                        {{-- <a href="{{ route('comments.create') }}" class="btn btn-white btn-round">Add Comment</a> --}}

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
                        Name
                    </th>
                    <th>
                        userName
                    </th>
                    <th>
                        PostName
                    </th>
                    <th >
                        control
                    </th>
              </tr>
            </thead>
              <tbody>
                @foreach($rows as $user)
                <tr>
                    <td>
                        {{ $user->id }}
                    </td>
                    <td>
                        {{ $user->name }}
                    </td>
                    <td>
                        {{ $user->users->name }}
                    </td>
                    <td>
                        {{ $user->posts->name }}
                    </td>
                    <td class="td-actions ">
                        {{-- {{ route('comments.edit',['id'=> $user]) }} --}}
                    <a href="{{ route('comments.edit',$user->id) }}">
                        <button type="button" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" data-original-title="Edit User">
                            <i class="material-icons">edit</i>
                          </button>
                    </a>
                        <form action="{{ route('comments.destroy',$user->id) }}" method="post" style="display: inline-block;">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                        <button  type="submit" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" data-original-title="Remove Comment">
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

