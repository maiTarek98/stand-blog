@extends('site.index')
@section('content')
    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="main-banner header-text">
      <div class="container-fluid">
        <div class="owl-banner owl-carousel">
          @foreach($random_blogs as $value)
          <div class="item">
            <img src="{{$value->getFirstMediaUrl('blog_image', 'thumb')}}" alt="{{$value->title}}">
            <div class="item-content">
              <div class="main-content">
                <div class="meta-category">
                  <span>{{$value->category->category_name}}</span>
                </div>
                <a href="post-details.html"><h4>{{$value->title}}</h4></a>
                <ul class="post-info">
                  <li><a href="#">{{$value->admin->name}}</a></li>
                  <li><a href="#">{{$value->created_at->toFormattedDateString()}}</a></li>
                  <li><a href="#">{{$value->blogcomments->count()}} Comments</a></li>
                </ul>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
    <!-- Banner Ends Here -->
    <section class="blog-posts">
      <div class="container">
        <div class="row">
           <div class="col-lg-4">
            @include('site.includes.sidebar')
          </div>
          <div class="col-lg-8">
            <div class="all-blog-posts">
              <div class="row">
                @foreach($latest_blogs as $val)
                <div class="col-lg-12">
                  <div class="blog-post">
                    <div class="blog-thumb">
                        <img src="{{$val->getFirstMediaUrl('blog_image', 'thumb')}}" alt="{{$val->title}}">
                    </div>
                    <div class="down-content">
                      <span>{{$val->category->category_name}}</span>
                      <a href="{{url('blog/'.$value->slug)}}"><h4>{{$val->title}}</h4></a>
                      <ul class="post-info">
                        <li>{{$val->admin->name}}</li>
                        <li>{{$val->created_at->toFormattedDateString()}}</li>
                        <li>{{$val->blogcomments->count()}} Comments</li>
                      </ul>
                      {!! $val->description !!}
                      <div class="post-options">
                        <div class="row">
                          <div class="col-6">
                            @if($val->tags->isNotEmpty())
                            <ul class="post-tags">
                              <li><i class="fa fa-tags"></i></li>
                              @foreach($val->tags as $tag)
                              <li><a href="{{url('blogs?tag='.$tag->tag_name)}}">{{$tag->tag->tag_name}}</a>,</li>
                              @endforeach
                            </ul>
                            @endif
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
                <div class="col-lg-12">
                  <div class="main-button">
                    <a href="{{url('/blogs')}}">@lang('translate.view all posts')</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
         
        </div>
      </div>
    </section>
@endsection