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


    <div class="col-lg-12 col-md-12">
        <div class="card">

            <div class="card-header card-header-primary">
                <div class="row">
                    <div class="col-md-8">
                        <h4 class="card-title"> categories Control</h4>
                      </div>
                      <div class="col-md-4 text-right">
                        {{-- {{ route('categories.create') }} --}}
                        <a href="{{ route('categories.create') }}" class="btn btn-white btn-round">Add category</a>

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

                    <td class="td-actions ">
                        {{-- {{ route('categories.edit',['id'=> $user]) }} --}}
                    <a href="{{ route('categories.edit',$user->id) }}">
                        <button type="button" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" data-original-title="Edit User">
                            <i class="material-icons">edit</i>
                          </button>
                    </a>
                        <form action="{{ route('categories.destroy',$user->id) }}" method="post" style="display: inline-block;">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                        <button  type="submit" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" data-original-title="Remove category">
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

