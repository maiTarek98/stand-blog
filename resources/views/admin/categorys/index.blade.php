@extends('admin.index')
@push('custom-css')
<style type="text/css">
  .search{
    margin-top: 20px;
  }
  .btn-search{
    position: relative;
    top: -38px;
    right: 112%;
  }
</style>
@endpush
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">@lang('main.show all categorys')</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('categorys.create')}}" class="btn btn-primary">@lang('main.add new category')</a></li>
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
          <div class="col-lg-12 col-md-12 card">
              <form>
                <div class="col-md-4">
                  <input type="text" name="search" class="form-control search" placeholder="@lang('main.search')">
                  <button type="submit" class="btn btn-success btn-search"><li class="fa fa-search"></li> @lang('main.search')  </button>
                </div>
              </form>

            <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <th>#</th>
                <th>@lang('main.category_name')</th>
                <th>@lang('main.actions')</th>

              </thead>
              <tbody>
                @foreach ($categorys as $key => $category)
                <tr>
                  <td>{{ ++$i }}</td>
                  <td>{{$category->category_name}}</td>
                  <td>
                      <a class="btn btn-info" href="{{ route('categorys.show',$category->id) }}">@lang('main.show')</a>
                      @can('category-edit')
                          <a class="btn btn-warning" href="{{ route('categorys.edit',$category->id) }}">@lang('main.edit')</a>
                      @endcan
                      @can('category-delete')
                          {!! Form::open(['method' => 'DELETE','route' => ['categorys.destroy', $category->id],'style'=>'display:inline']) !!}
                          <button type="submit" class="btn btn-danger">@lang('main.delete')</button>
                          {!! Form::close() !!}
                      @endcan
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            {!! $categorys->links() !!}
          </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection