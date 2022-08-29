
    <!-- Header -->
    <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="{{url('/')}}"><img style="width: 110px;
    height: 70px;" src="{{url('/storage/'.app(App\Models\GeneralSettings::class)->logo)}}" alt="{{app(App\Models\GeneralSettings::class)->site_name}}"></a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="{{url('/')}}">@lang('translate.home')
                  <span class="sr-only">(current)</span>
                </a>
              </li> 
              <li class="nav-item">
                <a class="nav-link" href="{{url('about-us')}}">@lang('translate.about us')</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{url('/blogs')}}">@lang('translate.blogs')</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{url('contact-us')}}">@lang('translate.contact us')</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
