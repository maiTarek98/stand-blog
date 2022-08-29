 <footer>
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <ul class="social-icons">
            @foreach($socials as $value)
              <li><a href="{{$value->link_url}}" target="_blank">{{$value->social_name}}</a></li>
            @endforeach
            </ul>
          </div>
        </div>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="{{url('/site')}}/vendor/jquery/jquery.min.js"></script>
    <script src="{{url('/site')}}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Additional Scripts -->
    <script src="{{url('/site')}}/assets/js/custom.js"></script>
    <script src="{{url('/site')}}/assets/js/owl.js"></script>
    <script src="{{url('/site')}}/assets/js/slick.js"></script>
    <script src="{{url('/site')}}/assets/js/isotope.js"></script>
    <script src="{{url('/site')}}/assets/js/accordions.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/js/toastr.js"></script>

    <!-- Page JS -->
        <script>
        $(document).ready(function() {
            toastr.options.timeOut = 10000;
            @if(Session::has('error'))
                toastr.error('{{ Session::get('error') }}');
            @endif
            @if(Session::has('success'))
                toastr.success('{{ Session::get('success') }}');
            @endif
        });
         function changeLanguage(lang){
        window.location='{{url("admin/change-language")}}/'+lang;
    }
</script>

    <script language = "text/Javascript"> 
      cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
      function clearField(t){                   //declaring the array outside of the
      if(! cleared[t.id]){                      // function makes it static and global
          cleared[t.id] = 1;  // you could use true and false, but that's more typing
          t.value='';         // with more chance of typos
          t.style.color='#fff';
          }
      }
    </script>

  </body>
</html>