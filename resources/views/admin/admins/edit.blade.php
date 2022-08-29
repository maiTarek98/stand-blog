@extends('admin.index')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">@lang('main.edit admin') {{$admin->name}}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admins.index')}}" class="btn btn-primary">@lang('main.show all admins') </a></li>
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
            <form method="post" action="{{route('admins.update', $admin->id)}}" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="form-group col-sm-10">
                <label for="name"> @lang('main.name')</label>
                <input type="text" name="name" value="{{$admin->name}}" class="form-control" id="name" placeholder="@lang('main.enter name')">
              </div>

              <div class="form-group col-sm-10">
                <label for="email">@lang('main.email')</label>
                <input type="email" name="email" value="{{$admin->email}}" class="form-control" id="email" placeholder="@lang('main.enter email')">
              </div>

              <div class="form-group col-sm-10">
                <label for="password">@lang('main.password')</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="@lang('main.enter password')">
              </div>
              <div class="form-group col-sm-10">
                <label for="roles">@lang('main.roles')</label>
                <select name="roles[]" class="form-control">
                  @foreach($roles as $role)
                  <option value="{{$role}}" {{ ($role == $adminRole) ? 'selected': ''}}>{{$role}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group col-sm-10">
                <button type="submit" class="btn btn-success">@lang('main.save')</button>
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