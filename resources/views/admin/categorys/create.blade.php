@extends('admin.index')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">@lang('main.add new category')</h1>
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
            <form method="post" action="{{route('categorys.store')}}" enctype="multipart/form-data">
              @csrf
              <div class="row">
              <div class="form-group col-sm-6">
                <label for="category_name"> @lang('main.category_name')</label>
                <input type="text" name="category_name" value="{{old('category_name')}}" class="form-control" id="category_name" placeholder="@lang('main.enter category_name')">
              </div>
              
              <div class="form-group col-sm-6">
                <label for="category_status">@lang('main.category_status')</label>
                <select name="category_status" class="form-control" id="category_status">
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