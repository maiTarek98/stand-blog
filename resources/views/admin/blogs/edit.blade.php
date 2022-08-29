@extends('admin.index')
@push('custom-css')
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

@endpush
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">@lang('main.edit blog') {{$blog->name}}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('blogs.index')}}" class="btn btn-primary">@lang('main.show all blogs') </a></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 col-md-12">
         @if(count($errors))
         <div class="alert alert-danger">
          <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif
        <div class="card">
          <div class="card-body">
            <form method="post" action="{{route('blogs.update', $blog->id)}}" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="row">
               <div class="form-group col-sm-6">
                <label for="category_id">@lang('main.category_id')</label>
                <select name="category_id" class="form-control" id="category_id">
                  @foreach($categorys as $category)
                  <option value="{{$category->id}}" {{ ($category->id == $blog->category_id) ? 'selected': ''}}>{{$category->category_name}}</option>
                  @endforeach
                </select>
              </div>
               <div class="form-group col-sm-12">
                <label for="tag_id">@lang('main.tag_id')</label>
                <select name="tag_id[]" multiple class="form-control" id="tag_id">
                  @foreach($tags as $tag)
                  <option value="{{$tag->id}}" {{ in_array(($tag->id-1), array_keys($blogtags)) ? 'selected': ''}}>{{$tag->tag_name}}</option>
                  @endforeach
                </select>
              </div>

              <div class="form-group col-sm-6">
                <label for="title"> @lang('main.title')</label>
                <input type="text" name="title" value="{{$blog->title}}" class="form-control" id="title" placeholder="@lang('main.enter title')">
              </div>

              <div class="form-group col-sm-6">
                <label for="blog_image">@lang('main.blog_image')</label>
                <input type="file" name="blog_image" class="form-control" id="blog_image">
                <img src="{{$blog->getFirstMediaUrl('blog_image', 'thumb')}}" width="30%">
              </div>

              <div class="form-group col-sm-12">
                <label for="description">@lang('main.description')</label>
                <textarea name="description" class="form-control" id="summernote" placeholder="@lang('main.enter description')">{{$blog->description}}</textarea>
              </div>

              <div class="form-group col-sm-6">
                <label for="status">@lang('main.status')</label>
                <select name="status" id="status" class="form-control">
                  <option value="show" {{ ($blog->status == 'show') ? 'selected': ''}}>@lang('main.show')</option>
                  <option value="hide" {{ ($blog->status == 'hide') ? 'selected': ''}}>@lang('main.hide')</option>
                </select>
              </div>
              <div class="form-group col-sm-10">
                <button type="submit" class="btn btn-success">@lang('main.save')</button>
              </div>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</div>
@endsection
@push('custom-js')
<script>
    $(document).ready(function() {
        $('#summernote').summernote({
  height: 150,   //set editable area's height
 
});
    });
  </script>
@endpush