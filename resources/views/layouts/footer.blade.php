
          <footer class="bg-secondary" style="margin-top: 75px;">
            <div class="section">
              <div class="container">
                <div class="row">
                  <div class="col-md-3 col-sm-6 mb-4 mb-md-0">
                    <a href="/" style="color: #000;
                    font-weight: bold;">YASSER</a>
                    {{-- <img src="{{ asset('front/images/logo.png')}}" alt="persa" class="img-fluid"> --}}
                  </div>
                  <div class="col-md-3 col-sm-6 mb-4 mb-md-0">
                    <h6>Address</h6>
                    <ul class="list-unstyled">
                      <li class="font-secondary text-dark">Egypt</li>
                      <li class="font-secondary text-dark">Mansoura</li>
                    </ul>
                  </div>
                  <div class="col-md-3 col-sm-6 mb-4 mb-md-0">
                    <h6>Contact Info</h6>
                    <ul class="list-unstyled">
                      <li class="font-secondary text-dark">Tel: +01064146183</li>
                      <li class="font-secondary text-dark">Mail: yasser.m22291@gmail.com</li>
                    </ul>
                  </div>
                  <div class="col-md-3 col-sm-6 mb-4 mb-md-0">
                    <h6>Follow</h6>
                    <ul class="list-inline d-inline-block">
                      <li class="list-inline-item"><a href="#" class="text-dark"><i class="ti-facebook"></i></a></li>
                      <li class="list-inline-item"><a href="#" class="text-dark"><i class="ti-twitter-alt"></i></a></li>
                      <li class="list-inline-item"><a href="#" class="text-dark"><i class="ti-linkedin"></i></a></li>
                      <li class="list-inline-item"><a href="#" class="text-dark"><i class="ti-github"></i></a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="text-center pb-3">
              <p class="mb-0">Copyright ©2020 Yasser </p>
            </div>
          </footer>

          <!-- jQuery -->
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

          <script src="{{ asset('front/plugins/jQuery/jquery.min.js') }}"></script>
          <!-- Bootstrap JS -->
          <script src="{{ asset('front/plugins/bootstrap/bootstrap.min.js') }}"></script>
          <!-- slick slider -->
          <script src="{{ asset('front/plugins/slick/slick.min.js') }}"></script>
          <!-- masonry -->
          <script src="{{ asset('front/plugins/masonry/masonry.js') }}"></script>
          <!-- instafeed -->
          <script src="{{ asset('front/plugins/instafeed/instafeed.min.js') }}"></script>
          <!-- smooth scroll -->
          <script src="{{ asset('front/plugins/smooth-scroll/smooth-scroll.js') }}"></script>
          <!-- headroom -->
          <script src="{{ asset('front/plugins/headroom/headroom.js') }}"></script>
          <!-- reading time -->
          <script src="{{ asset('front/plugins/reading-time/readingTime.min.js') }}"></script>
          <!-- Main Script -->


          <script type="text/javascript">
            var url = "{{ route('like') }}";
            var url_dis = "{{ route('dislike') }}";
            var token = "{{ Session::token() }}";
        </script>
          <script src="{{ asset('front/js/like.js') }}"></script>

          <script src="{{ asset('front/js/script.js') }}"></script>

          </body>
    </body>


    </html>
