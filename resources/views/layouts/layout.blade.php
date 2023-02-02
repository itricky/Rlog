<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
    @vite('resources/css/layout.css')
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('css/layout.css') }}" /> --}}
</head>
<style>
    body {
        cursor: url(https://ani.cursors-4u.net/games/gam-16/gam1537.cur), auto !important
    }
</style>

<body class="bg-dark">
    <header class="p-3 bg-dark text-white">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="{{ url('/') }}" class="nav-link px-2 text-white"><font size="6">首頁</font></a></li>
                    {{-- <li><a href="{{url('/')}}" class="nav-link px-2 text-secondary">首頁</a></li> --}}
                    {{-- <li><a href="#" class="nav-link px-2 text-white">Features</a></li> --}}
                    {{-- <li><a href="#" class="nav-link px-2 text-white">Pricing</a></li> --}}
                    {{-- <li><a href="#" class="nav-link px-2 text-white">FAQs</a></li> --}}
                    {{-- <li><a href="#" class="nav-link px-2 text-white">About</a></li> --}}
                </ul>

                <div class="text-end">
                    @if (Route::has('login'))
                        <div>
                            @auth
                                <ul class="nav">
                                    <li class="nav-item">
                                        <a class="btn btn-outline-light me-2" href="{{ url('user/profile') }}">帳號管理</a>
                                    </li>
                                    <li class="nav-item">
                                        <button class="btn btn-outline-light me-2">登出</button>
                                    </li>
                                </ul>
                            @else
                                <a class="btn btn-outline-light me-2" href="{{ route('login') }}"> 登入 </a>
                                @if (Route::has('register'))
                                    <a type="button" class="btn btn-outline-warning me-2"
                                        href="{{ route('register') }}">註冊</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </header>

    <div class="container-fluid">
        @yield('content')
    </div>

    // model
    <form id="logOut" method="POST" action="{{ route('logout') }}" x-data hidden>
        @csrf
    </form>

    @include('layouts.footer')
</body>
@vite('resources/js/app.js')
@vite('resources/js/layout.js')
{{-- <script src="{{ asset('/js/jquery.js') }}"></script> --}}
{{-- <script src="{{ asset('suite/sweetalert2/dist/sweetalert2.all.js') }}"></script> --}}

<script type="module">
    $(document).ready(function() {
        $("button").click(function() {
            $("#logOut").submit();
        });
    });
</script>

<script type="module">

// sweetalert2，測試
    // Swal.fire({
    //     position: 'top-end',
    //     icon: 'success',
    //     title: 'Your work has been saved',
    //     showConfirmButton: false,
    //     timer: 1500
    // })

</script>
    @stack('scripts')
</html>
