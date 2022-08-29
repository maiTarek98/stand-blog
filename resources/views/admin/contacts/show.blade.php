@extends('admin.index')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">@lang('main.show contacts') {{$contacts->name}}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('contacts.index')}}" class="btn btn-primary">@lang('main.show all contacts')</a></li>
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
                <input type="text" name="name" value="{{$contacts->name}}" class="form-control" id="name" readonly>
              </div>
              <div class="form-group col-sm-10">
                <label for="phone"> @lang('main.phone')</label>
                <input type="text" name="phone" value="{{$contacts->phone}}" class="form-control" id="phone" readonly>
              </div>

              <div class="form-group col-sm-10">
                <label for="subject">@lang('main.subject')</label>
                <input type="text" name="subject" @if($contacts->subject == 'suggestion') value="@lang('main.suggestion')" @elseif($contacts->subject == 'inquiry') value="@lang('main.inquiry')" @elseif($contacts->subject == 'complain') value="@lang('main.complain')" @elseif($contacts->subject == 'other') value="@lang('main.other')" @endif class="form-control" id="subject" readonly>
              </div>
              
              <div class="form-group col-sm-10">
                <label for="message">@lang('main.message')</label>
                <input type="text" name="message" class="form-control" value="{{$contacts->message}}" readonly>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</div>
@endsection