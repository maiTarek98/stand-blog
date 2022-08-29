@extends('site.index')
@section('content')
    <!-- Banner Starts Here -->
    <div class="heading-page header-text">
      <section class="page-heading">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="text-content" style="    float: right;"> 
                <h4>@lang('translate.post details')</h4>
                <h2>@lang('translate.more details')</h2>
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
                <div class="col-lg-12">
                  <div class="blog-post">
                    <div class="blog-thumb">
						<img src="{{$blog->getFirstMediaUrl('blog_image', 'thumb')}}" alt="{{$blog->title}}">                    
					</div>
                    <div class="down-content">
                      <span>{{$blog->category->category_name}}</span>
                      <h4>{{$blog->title}}</h4>
                      <ul class="post-info">
						  <li>{{$blog->admin->name}}</li>
		                  <li>{{$blog->created_at->toFormattedDateString()}}</li>
		                  <li>{{$blog->blogcomments->count()}} Comments</li>                      
		              </ul>
		              {!! $blog->description !!}
                      <div class="post-options">
                        <div class="row">
                          <div class="col-6">
                            <ul class="post-tags">
 							  @foreach($blog->tags as $tag)
                              <li><a href="{{url('blogs?tag='.$tag->tag_name)}}">{{$tag->tag->tag_name}}</a>,</li>
                              @endforeach                             
                          	</ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="sidebar-item comments">
                    <div class="sidebar-heading">
                      <h2>{{$blog->blogcomments->count()}} @lang('translate.comments')</h2>
                    </div>
                    <div class="content">
                      <ul>
                      	@foreach($blog->blogcomments as $comment)
                        <li style="width:100%;">
                          <div class="author-thumb">
                            <img src="{{url('site')}}/assets/images/avatar.png" alt="{{$comment->name}}">
                          </div>
                          <div class="right-content">
                            <h4>{{$comment->name}}<span>{{$comment->created_at->toFormattedDateString()}}</span></h4>
                            <p>{{$comment->comment}}.</p>
                          </div>
                        </li>
                       @endforeach
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="sidebar-item submit-comment">
                    <div class="sidebar-heading">
                      <h2>@lang('translate.your comment')</h2>
                    </div>
                    <div class="content">
                      <form id="comment" action="{{route('storeComment', $blog->id)}}" method="post">
                      	@csrf
                        <div class="row">
                          <div class="col-md-6 col-sm-12">
                            <fieldset>
                              <input name="name" type="text" id="name" placeholder="@lang('translate.your name')" required="">
                            </fieldset>
                          </div>
                          <div class="col-md-6 col-sm-12">
                            <fieldset>
                              <input name="email" type="text" id="email" placeholder="@lang('translate.your email')" required="">
                            </fieldset>
                          </div>
                          <div class="col-lg-12">
                            <fieldset>
                              <textarea name="comment" rows="6" id="comment" placeholder="@lang('translate.type your comment')" required=""></textarea>
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
              </div>
            </div>
          </div>
          
        </div>
      </div>
    </section>

@endsection