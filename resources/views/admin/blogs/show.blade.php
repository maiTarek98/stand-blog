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
          <h1 class="m-0 text-dark">@lang('main.show blog') {{$blog->title}}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('blogs.index')}}" class="btn btn-primary">@lang('main.show all blogs')</a></li>
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
        <div class="card">
          <div class="card-body">
            <div class="form-group col-sm-10">
                <label for="category_id"> @lang('main.category_id')</label>
                <input type="text" name="category_id" value="{{$blog->category->category_name}}" class="form-control" id="category_id" readonly>
              </div>
              <div class="form-group col-sm-10">
                <label for="tag_id"> @lang('main.tag_id')</label>
                <input type="text" name="tag_id" value="@foreach($blog->tags as $val) {{$val->tag->tag_name}} , @endforeach" class="form-control" id="tag_id" readonly>
              </div>
              <div class="form-group col-sm-10">
                <label for="admin_id"> @lang('main.admin_id')</label>
                <input type="text" name="admin_id" value="{{$blog->admin->name}}" class="form-control" id="admin_id" readonly>
              </div>
              <div class="form-group col-sm-10">
                <label for="title"> @lang('main.title')</label>
                <input type="text" name="title" value="{{$blog->title}}" class="form-control" id="title" readonly>
              </div>
              <div class="form-group col-sm-10">
                <label for="description">@lang('main.description')</label>
                <textarea name="description" class="form-control" id="summernote" placeholder="@lang('main.enter description')" readonly>{{$blog->description}}</textarea>
              </div>

              <div class="form-group col-sm-10">
                <label for="blog_image">@lang('main.blog_image')</label>
                <img src="{{$blog->getFirstMediaUrl('blog_image', 'thumb')}}" width="30%">
              </div>
              <div class="form-group col-sm-10">
                <label for="status">@lang('main.status')</label>
                <input type="text" name="status" class="form-control" value="{{$blog->status}}" readonly>
              </div>
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
        $('#summernote').summernote('disable');
    });
  </script>
@endpush