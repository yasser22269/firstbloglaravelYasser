{{ csrf_field() }}
<div class="row">



  <div class="col-md-12">
    <div class="form-group bmd-form-group">
        <label class="bmd-label-floating">Name</label>
        <textarea name="name"  cols="30" rows="5" class="form-control ">{{ isset($row) ? $rows->name : '' }}</textarea>
        @if ($errors->has('name'))
        <span class="help-block">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
    @endif
    </div>
</div>
</div>
