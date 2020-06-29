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
        <option style="background: #202940;" value="{{ $category->id }}"{{ $posts->category_id == $category->id ? 'selected' : ''}} }}
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
            <option   value="{{ $tag->id }}"  {{ in_array( $tag->id, $selectedTags) ? 'selected' : '' }}>{{  $tag->name }}</option>
        @endforeach
        </select>
        @if ($errors->has('category'))
        <span class="help-block">
            <strong>{{ $errors->first('category_id') }}</strong>
        </span>
    @endif
      </div>
  </div>
