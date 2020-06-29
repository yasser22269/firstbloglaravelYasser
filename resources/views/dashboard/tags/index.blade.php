@extends('layouts.dashboard.app')

 @section('title')
 tags Control
@endsection

@section('content')
     @component('layouts.dashboard.header')
        @slot('nav_title')
            tags Control
        @endslot
    @endcomponent


    <div class="col-lg-12 col-md-12">
        <div class="card">

            <div class="card-header card-header-primary">
                <div class="row">
                    <div class="col-md-8">
                        <h4 class="card-title"> tags Control</h4>
                      </div>
                      <div class="col-md-4 text-right">
                        {{-- {{ route('tags.create') }} --}}
                        <a href="{{ route('tags.create') }}" class="btn btn-white btn-round">Add tag</a>

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

                    {{-- <th>
                        group
                    </th> --}}
                    <th >
                        control
                    </th>
              </tr>
            </thead>
              <tbody>
                @foreach($rows as $tag)
                <tr>
                    <td>
                        {{ $tag->id }}
                    </td>
                    <td>
                        {{ $tag->name }}
                    </td>
    
                    <td class="td-actions ">
                        {{-- {{ route('tags.edit',['id'=> $tag]) }} --}}
                    <a href="{{ route('tags.edit',$tag->id) }}">
                        <button type="button" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" data-original-title="Edit tag">
                            <i class="material-icons">edit</i>
                          </button>
                    </a>
                        <form action="{{ route('tags.destroy',$tag->id) }}" method="post" style="display: inline-block;">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                        <button  type="submit" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" data-original-title="Remove tag">
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

