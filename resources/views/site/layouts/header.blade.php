<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="{{app(App\Models\GeneralSettings::class)->site_name}}">

    <title>{{app(App\Models\GeneralSettings::class)->site_name}}</title>

    <!-- Bootstrap core CSS -->
    <link href="{{url('/site')}}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <link rel="icon" type="image/x-icon" href="{{url('/storage/'.app(App\Models\GeneralSettings::class)->logo)}}">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{url('/site')}}/assets/css/fontawesome.css">
    <link rel="stylesheet" href="{{url('/site')}}/assets/css/templatemo-stand-blog.css">
    <link rel="stylesheet" href="{{url('/site')}}/assets/css/owl.css">
<!--

TemplateMo 551 Stand Blog

https://templatemo.com/tm-551-stand-blog

-->
    <link href="{{url('/dashboard/')}}/dist/css/toastr.css" rel="stylesheet" />

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Almarai:wght@300&display=swap" rel="stylesheet">
<style type="text/css">
  body{
    font-family: 'Almarai', sans-serif;

  }
</style>

  </head>

  <body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->
