@extends('admin.index')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">@lang('main.show role') {{$role->name}}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('roles.index')}}" class="btn btn-primary">@lang('main.show all roles')</a></li>
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
                <label for="name"> @lang('main.name')</label>
                <input type="text" name="name" value="{{$role->name}}" class="form-control" id="name" readonly>
              </div>
              <div class="form-group col-sm-10">
                <label for="roles">@lang('main.role')</label>
                <br>
                @if(!empty($rolePermissions))
                    @foreach($rolePermissions as $v)
                         - <label class="label label-success">{{ $v->name }}</label>
                        <br>
                    @endforeach
                @endif              
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</div>
@endsection