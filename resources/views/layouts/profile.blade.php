<!doctype html>
<html lang="{{ app()->getLocale() }}" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ Auth::user()->name . ' | ' . config('tabler.suffix') }}</title>
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet" />
    @stack('styles')
</head>

<body>
    <div class="page">
        <div class="page-main">
            <div class="header py-4">
                <div class="container">
                    <div class="d-flex">
                        <a class="header-brand" href="{!! route('profile.index') !!}">
                            <img src="{!! config('tabler.logo') !!}" class="header-brand-img" alt="Logo">
                        </a>
                        <div class="d-flex order-lg-2 ml-auto">
                            @if (Auth::check())
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
                        @if (config('tabler.support.search'))
                            <div class="col-lg-3 ml-auto">
                                <form class="input-icon my-3 my-lg-0" action="{!! config('tabler.urls.searchUrl') !!}" method="GET">
                                    <input type="search" class="form-control header-search"
                                        placeholder="Search&hellip;" tabindex="1" name="keywords">
                                    <div class="input-icon-addon">
                                        <i class="fe fe-search"></i>
                                    </div>
                                </form>
                            </div>
                        @endif
                        <div class="col-lg order-lg-first">
                            @if (Menu::exists('profile'))
                                @include('layouts._partials.profile-menu')
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="my-3 my-md-5">
                <div class="container">
                    <div class="page-header">
                        <!-- <h1 class="page-title">
                            {{ isset($title) ? $title : '' }}
                        </h1> -->
                    </div>
                    <div class="page-content">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-4 d-none d-md-block">
                                    <div class="card card-profile">
                                        <div class="card-header"
                                            style="background-image: url(/images/src/eberhard-grossgasteiger-311213-500.jpg);">
                                        </div>
                                        <div class="card-body text-center">
                                            <img class="card-profile-img" src="/images/src/user.jpg">
                                            <h3 class="mb-0">{{ Auth::user()->name }}</h3>
                                            <p class="text-muted mb-2">NIP. {{ Auth::user()->karyawan->no_induk }}</p>
                                            <a href="{{ route('profile.detail', Auth::user()->username) }}"
                                                class="btn btn-outline-primary btn-sm">
                                                <span class="fe fe-edit"></span> Detail
                                            </a>
                                        </div>
                                    </div>
                                    <a href="{{ route('profile.mutabaah.index') }}"
                                        class="btn btn-primary btn-block mb-4">Evaluasi
                                        Ibadah</a>
                                </div>
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if (config('tabler.support.footer-menu'))
            <div class="footer">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                @if (Menu::exists('footer'))
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
    <script src="{{ asset('js/toastr.min.js') }}"></script>
    @stack('scripts')
</body>

</html>
