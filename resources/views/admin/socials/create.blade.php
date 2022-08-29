@extends('admin.index')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">@lang('main.add new social')</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('socials.index')}}" class="btn btn-primary">@lang('main.show all socials')</a></li>
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
            <form method="post" action="{{route('socials.store')}}" enctype="multipart/form-data">
              @csrf
              <div class="row">
              <div class="form-group col-sm-6">
                <label for="social_name"> @lang('main.social_name')</label>
                <input type="text" name="social_name" value="{{old('social_name')}}" class="form-control" id="social_name" placeholder="@lang('main.enter social_name')">
              </div>
              <div class="form-group col-sm-6">
                <label for="link_url"> @lang('main.link_url')</label>
                <input type="url" name="link_url" value="{{old('link_url')}}" class="form-control" id="link_url" placeholder="@lang('main.enter link_url')">
              </div>
              
              <div class="form-group col-sm-6">
                <label for="status">@lang('main.status')</label>
                <select name="status" class="form-control" id="status">
                  <option value="show">@lang('main.show')</option>
                  <option value="hide">@lang('main.hide')</option>
                </select>
              </div>
              

              <div class="form-group col-sm-10">
                <button type="submit" class="btn btn-success">@lang('main.create')</button>
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