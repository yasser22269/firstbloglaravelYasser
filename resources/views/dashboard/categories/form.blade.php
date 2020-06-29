{{ csrf_field() }}
<div class="row">

  <div class="col-md-12">
    <div class="form-group bmd-form-group">
      <label class="bmd-label-floating">Name</label>
      <input type="text"Name='name' value="{{ isset($rows) ? $rows->name : '' }}" class="form-control">
      @if ($errors->has('name'))
      <span class="help-block">
          <strong>{{ $errors->first('name') }}</strong>
      </span>
  @endif
    </div>
  </div>
</div>
