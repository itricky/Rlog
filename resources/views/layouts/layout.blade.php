
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/layout.css') }}" />
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container-fluid">
          <a class="navbar-brand" href="{{ url('/') }}">Rlog</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ url('/') }}">首頁</a>
              </li>
              <li class="nav-item">
                {{-- <a class="nav-link" href="#">基本資料</a> --}}
              </li>
              <li class="nav-item">
                {{-- <a class="nav-link" href="#">工作經歷</a> --}}
              </li>
              <li class="nav-item">
                {{-- <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a> --}}
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <br>

    <div class="container-fluid">
        @yield('content')
    </div>
    @include('layouts.footer')
</body>
</html>

