<!doctype html>
<html lang="{{ app()->getLocale() }}" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ auth()->user()->name .' | '. config('tabler.suffix') }}</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet" />
    @stack('styles')
</head>

<body>
    <div class="page">
        <div class="page-main">
            <div class="header py-4">
                <div class="container">
                    <div class="d-flex">
                        <a class="header-brand" href="{!! url(config('tabler.urls.homepage', '/')) !!}">
                            <img src="{!! config('tabler.logo') !!}" class="header-brand-img" alt="Logo">
                        </a>
                        <div class="d-flex order-lg-2 ml-auto">
                            @if(Auth::check())
                            @include('layouts._partials.user')
                            @endif
                        </div>
                        <a href="#" class="header-toggler d-lg-none ml-3 ml-lg-0" data-toggle="collapse"
                            data-target="#headerMenuCollapse">
                            <span class="header-toggler-icon"></span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="header collapse d-lg-flex p-0" id="headerMenuCollapse">
                <div class="container">
                    <div class="row align-items-center">
                        @if(config('tabler.support.search'))
                        <div class="col-lg-3 ml-auto">
                            <form class="input-icon my-3 my-lg-0" action="{!! config('tabler.urls.searchUrl') !!}"
                                method="GET">
                                <input type="search" class="form-control header-search" placeholder="Search&hellip;"
                                    tabindex="1" name="keywords">
                                <div class="input-icon-addon">
                                    <i class="fe fe-search"></i>
                                </div>
                            </form>
                        </div>
                        @endif
                        <div class="col-lg order-lg-first">
                            @if(Menu::exists('profile'))
                            @include('layouts._partials.profile-menu')
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="my-3 my-md-5">
                <div class="container">
                    <div class="page-header">
                        <h1 class="page-title">
                            {{ isset($title) ? $title : '' }}
                        </h1>
                    </div>
                    <div class="page-content">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="card card-profile">
                                        <div class="card-header"
                                            style="background-image: url(/images/src/eberhard-grossgasteiger-311213-500.jpg);">
                                        </div>
                                        <div class="card-body text-center">
                                            <img class="card-profile-img" src="/images/src/user.jpg">
                                            <h3 class="mb-0">{{ $user->name }}</h3>
                                            <p class="text-muted mb-2">{{ $user->karyawan->no_induk }}</p>
                                            <button class="btn btn-outline-primary btn-sm">
                                                <span class="fe fe-edit"></span> Detail
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Social Media</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="text-center">
                                                <button type="button" class="btn btn-icon btn-facebook"><i
                                                        class="fa fa-facebook"></i></button>
                                                <button type="button" class="btn btn-icon btn-twitter"><i
                                                        class="fa fa-twitter"></i></button>
                                                <button type="button" class="btn btn-icon btn-google"><i
                                                        class="fa fa-google"></i></button>
                                                <button type="button" class="btn btn-icon btn-instagram"><i
                                                        class="fa fa-instagram"></i></button>
                                                <button type="button" class="btn btn-icon btn-green"><i
                                                        class="fa fa-whatsapp"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if(config('tabler.support.footer-menu'))
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            @if(Menu::exists('footer'))
                            @include('layouts._partials.footer-menu')
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        <footer class="footer">
            <div class="container">
                <div class="row align-items-center flex-row-reverse">
                    <div class="col-12 col-lg-auto mt-3 mt-lg-0 text-center">
                        {!! config('tabler.footer') !!}
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/chart.bundle.min.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.select.min.js') }}"></script>
    @stack('scripts')
</body>

</html>
