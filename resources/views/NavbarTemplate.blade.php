<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="{{asset('css/bootstrap/bootstrap.min.css')}}" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
  @yield('head-link')
</head>

<body style="background-color: @yield('body-color');">
  <style>
    .links{
      margin-left: 250px; 
    }
  </style>

<nav class="navbar-expand-lg navbar navbar-dark bg-dark">
  <p style="color: white;">{{date("h:i:s")}}</p>
  <a class="navbar-brand" href="#">ABC</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item @if(isset($details))active @endif">
        <a class="nav-link" href="/all/students">Students <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item @if(isset($todo))active @endif">
        <a class="nav-link" href="{{route('todo.show')}}">To-Do App</a>
      </li>
    </ul>
  </div>
</nav>
<div class="@if(isset($todo))container @else container-fluid @endif">
  @yield('content')
</div>
</body>
</html>