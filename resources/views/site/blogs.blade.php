@extends('site.index')
@section('content')
<!-- Banner Starts Here -->
    <div class="heading-page header-text">
      <section class="page-heading">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="text-content" style="    float: right;">
                <h4>@lang('translate.recent blogs')</h4>
                <h2>@lang('translate.our recent blogs')</h2>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    
    <section class="blog-posts grid-system">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
                @include('site.includes.sidebar')

          </div>
          <div class="col-lg-8">
            <div class="all-blog-posts">
              <div class="row">
              @isset($blogs)
              @foreach($blogs as $value)
                <div class="col-lg-6">
                  <div class="blog-post">
                    <div class="blog-thumb">
            			<img src="{{$value->getFirstMediaUrl('blog_image', 'thumb')}}" alt="{{$value->title}}">
                    </div>
                    <div class="down-content">
                  	  <span>{{$value->category->category_name}}</span>
		                <a href="{{url('/blog/'.$value->slug)}}"><h4>{{$value->title}}</h4></a>
		                <ul class="post-info">
		                  <li>{{$value->admin->name}}</li>
		                  <li>{{$value->created_at->toFormattedDateString()}}</li>
		                  <li>@lang('translate.comments') {{$value->blogcomments->count()}}</li>
		                </ul>
                      <p>{{strip_tags(substr($value->description, 0, 200))}}</p>
                      <div class="post-options">
                        <div class="row">
                          <div class="col-lg-12">
                            <ul class="post-tags">
							  @foreach($value->tags as $tag)
                              <li><a href="{{url('blogs?tag='.$tag->tag_name)}}">{{$tag->tag->tag_name}}</a>,</li>
                              @endforeach                            
                          	</ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
               @endforeach
                <div class="col-lg-12">
                   {{$blogs->render()}}
                </div>
               @endisset
               @if($blogs->isEmpty())
               <h3>@lang('translate.no blogs to be shown')</h3>
               @endif
              </div>
            </div>
          </div>
          
        </div>
      </div>
    </section>
@endsection