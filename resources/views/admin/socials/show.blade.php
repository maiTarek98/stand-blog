@extends('admin.index')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">@lang('main.show social') {{$social->social_name}}</h1>
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
        <div class="card">
          <div class="card-body">
              <div class="form-group col-sm-10">
                <label for="social_name"> @lang('main.social_name')</label>
                <input type="text" name="social_name" value="{{$social->social_name}}" class="form-control" id="social_name" readonly>
              </div>
             <div class="form-group col-sm-10">
                <label for="link_url"> @lang('main.link_url')</label>
                <input type="url" name="link_url" value="{{$social->link_url}}" class="form-control" id="link_url" readonly>
              </div>
              <div class="form-group col-sm-10">
                <label for="status">@lang('main.status')</label>
                <input type="text" name="status" class="form-control" value="{{$social->status}}" readonly>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</div>
@endsection