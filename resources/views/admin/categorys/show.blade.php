@extends('admin.index')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">@lang('main.show category') {{$category->name}}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('categorys.index')}}" class="btn btn-primary">@lang('main.show all categorys')</a></li>
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
                <label for="category_name"> @lang('main.category_name')</label>
                <input type="text" name="category_name" value="{{$category->category_name}}" class="form-control" id="category_name" readonly>
              </div>
             
              <div class="form-group col-sm-10">
                <label for="category_status">@lang('main.category_status')</label>
                <input type="text" name="category_status" class="form-control" value="{{$category->category_status}}" readonly>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</div>
@endsection