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
  <div class="col-md-12">
    <div class="form-group bmd-form-group">
      <label class="bmd-label-floating">Email address</label>
      <input type="email"name='email' value="{{ isset($rows) ? $rows->email : '' }}" class="form-control">
      @if ($errors->has('email'))
      <span class="help-block">
          <strong>{{ $errors->first('email') }}</strong>
      </span>
  @endif
    </div>
  </div>
  <div class="col-md-12">
    <div class="form-group bmd-form-group">
      <label class="bmd-label-floating">Password</label>
      <input type="Password" name='password' class="form-control">
      @if ($errors->has('password'))
      <span class="help-block">
          <strong>{{ $errors->first('password') }}</strong>
      </span>
  @endif
    </div>
  </div>
</div>
