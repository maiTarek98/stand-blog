<div class="sidebar">
              <div class="row">
<!--                 <div class="col-lg-12">
                  <div class="sidebar-item search">
                    <form id="search_form" name="gs" method="GET" action="#">
                      <input type="text" name="q" class="searchText" placeholder="type to search..." autocomplete="on">
                    </form>
                  </div>
                </div>
 -->                <div class="col-lg-12">
                  <div class="sidebar-item recent-posts">
                    <div class="sidebar-heading">
                      <h2>@lang('translate.recent blogs')</h2>
                    </div>
                    <div class="content">
                      <ul>
                        @foreach($random_blogs as $value)
                        <li><a href="post-details.html">
                          <h5>{{$value->title}}</h5>
                          <span>{{$value->created_at->toFormattedDateString()}}</span>
                        </a></li>
                        @endforeach
                        
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="sidebar-item categories">
                    <div class="sidebar-heading">
                      <h2>@lang('translate.categories')</h2>
                    </div>
                    <div class="content">
                      <ul>
                        @foreach($categorys as $cat)
                        <li style="direction:rtl;"><a href="{{url('blogs?category='.$cat->category_name)}}">- {{$cat->category_name}}</a></li>
                        @endforeach
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="sidebar-item tags">
                    <div class="sidebar-heading">
                      <h2>@lang('translate.tags')</h2>
                    </div>
                    <div class="content">
                      <ul>
                        @foreach($tags as $tag)
                        <li><a href="{{url('blogs?tag='.$tag->tag_name)}}">{{$tag->tag_name}}</a></li>
                        @endforeach
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>