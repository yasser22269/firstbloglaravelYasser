@extends('layouts.app')
@section('title','Contact')
@section('content')
<section class="section">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h2 class="mb-4">Contact Us</h2>
          <img src="{{ asset('front/images/contact.jpg')}}" alt="author" class="img-fluid w-100 mb-4">
          <p class="mb-5">Strikes the upper surface of the impenetrable foliage of my trees, and but a few stray gleams steal into the inner sanctuary, I throw myself down among the tall grass by the trickling stream and, as I lie close to the earth, a thousand unknown plants are noticed by me.<br><br>When I hear the buzz of the little world among the stalks, and grow familiar with the countless indescribable forms of the insects and flies, then I feel the presence of the Almighty, who formed us in his own image, and the breath of that universal love which bears and sustains.</p>
          <form action="{{ url('front/contact')}}" class="row" method="POST">
            @csrf

            <div class="col-lg-6">
              <input type="text" class="form-control mb-4" name="name" id="name" placeholder="Name">
            </div>
            <div class="col-lg-6">
                <input type="subject" class="form-control mb-4" name="subject" id="subject" placeholder="subject">
              </div>
            <div class="col-lg-12">
              <input type="email" class="form-control mb-4" name="email" id="email" placeholder="Email">
            </div>

            <div class="col-12">
              <textarea name="massage" id="massage" class="form-control mb-4" placeholder="massage..."></textarea>
            </div>
            <div class="col-12">
              <button class="btn btn-primary" type="submit" >Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>


@endsection
