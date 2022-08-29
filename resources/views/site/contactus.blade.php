@extends('site.index')
@section('content')
    <!-- Banner Starts Here -->
    <div class="heading-page header-text">
      <section class="page-heading">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="text-content" style="float: right;">
                <h4>@lang('translate.contact us')</h4>
                <h2>@lang('translate.LET’S STAY IN TOUCH!')</h2>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    
    <!-- Banner Ends Here -->


    <section class="contact-us">
      <div class="container">
        <div class="row">
        
          <div class="col-lg-12">
            <div class="down-contact">
              <div class="row">
                <div class="col-lg-8">
                  <div class="sidebar-item contact-form">
                    <div class="sidebar-heading">
                      <h2>@lang('translate.send us a message')</h2>
                    </div>
                    <div class="content">
                      <form id="contact" action="{{route('storeContact')}}" method="post">
                      	@csrf
                        <div class="row">
                          <div class="col-md-6 col-sm-12">
                            <fieldset>
                              <input name="name" type="text" id="name" placeholder="@lang('translate.your name')" required="">
                            </fieldset>
                          </div>
                          <div class="col-md-6 col-sm-12">
                            <fieldset>
                              <input name="email" type="email" id="email" placeholder="@lang('translate.your email')" required="">
                            </fieldset>
                          </div>
                          <div class="col-md-12 col-sm-12">
                            <fieldset>
                              <input name="subject" type="text" id="subject" placeholder="@lang('translate.subject')">
                            </fieldset>
                          </div>
                          <div class="col-lg-12">
                            <fieldset>
                              <textarea name="message" rows="6" id="message" placeholder="@lang('translate.your message')" required=""></textarea>
                            </fieldset>
                          </div>
                          <div class="col-lg-12">
                            <fieldset>
                              <button type="submit" id="form-submit" class="main-button">@lang('translate.send')</button>
                            </fieldset>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="sidebar-item contact-information">
                    <div class="sidebar-heading">
                      <h2>@lang('translate.contact info')</h2>
                    </div>
                    <div class="content">
                      <ul>
                        <li>
                          <h5>{{app(App\Models\GeneralSettings::class)->mobile}}</h5>
                          <span>@lang('translate.mobile')</span>
                        </li>
                        <li>
                          <h5>{{app(App\Models\GeneralSettings::class)->email}}</h5>
                          <span>@lang('translate.email address')</span>
                        </li>
                        <li>
                          <h5>{{app(App\Models\GeneralSettings::class)->address}}</h5>
                          <span>@lang('translate.address')</span>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-lg-12">
            <div id="map">
              <iframe src="https://maps.google.com/maps?q=Av.+L%C3%BAcio+Costa,+Rio+de+Janeiro+-+RJ,+Brazil&t=&z=13&ie=UTF8&iwloc=&output=embed" width="100%" height="450px" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
          </div>
          
        </div>
      </div>
    </section>
@endsection