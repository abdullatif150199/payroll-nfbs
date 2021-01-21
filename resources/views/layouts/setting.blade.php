<!doctype html>
<html lang="{{ app()->getLocale() }}" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ isset($title) ? $title .' | '. config('tabler.suffix') : config('tabler.suffix') }}</title>
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/chart.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet" />
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
                            @if(Menu::exists('primary'))
                            @include('layouts._partials.primary-menu')
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="my-3 my-md-5">
                <div class="container">
                    <div class="page-header">
                        <h1 class="page-title">
                            {!! isset($title) && $title != 'Setting' ? 'Setting &RightArrow; ' . $title : 'Setting' !!}
                        </h1>
                    </div>

                    {{-- Content --}}
                    <div class="page-content">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-3">
                                    {{-- Social media --}}
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Menu Setting</h4>
                                        </div>
                                        <table class="table card-table">
                                            <tbody>
                                                <tr>
                                                    <td width="1"><i
                                                            class="{{ Route::is('dash.setting') ? 'fa fa-circle' : 'fa fa-circle-o' }} text-primary"></i>
                                                    </td>
                                                    <td><a href="{{ route('dash.setting') }}">General</a></td>
                                                </tr>
                                                <tr>
                                                    <td width="1"><i
                                                            class="{{ Route::is('dash.user.index') ? 'fa fa-circle' : 'fa fa-circle-o' }} text-primary"></i>
                                                    </td>
                                                    <td><a href="{{ route('dash.user.index') }}">Users</a></td>
                                                </tr>
                                                <tr>
                                                    <td width="1"><i
                                                            class="{{ Route::is('dash.rekening') ? 'fa fa-circle' : 'fa fa-circle-o' }} text-primary"></i>
                                                    </td>
                                                    <td><a href="{{ route('dash.rekening') }}">Rekening Cover</a></td>
                                                </tr>
                                                <tr>
                                                    <td width="1"><i
                                                            class="{{ Route::is('dash.golongan') ? 'fa fa-circle' : 'fa fa-circle-o' }} text-primary"></i>
                                                    </td>
                                                    <td><a href="{{ route('dash.golongan') }}">Golongan</a></td>
                                                </tr>
                                                <tr>
                                                    <td width="1"><i
                                                            class="{{ Route::is('dash.bidang') ? 'fa fa-circle' : 'fa fa-circle-o' }} text-primary"></i>
                                                    </td>
                                                    <td><a href="{{ route('dash.bidang') }}">Bidang</a></td>
                                                </tr>
                                                <tr>
                                                    <td width="1"><i
                                                            class="{{ Route::is('dash.unit') ? 'fa fa-circle' : 'fa fa-circle-o' }} text-primary"></i>
                                                    </td>
                                                    <td><a href="{{ route('dash.unit') }}">Unit</a></td>
                                                </tr>
                                                <tr>
                                                    <td width="1"><i
                                                            class="{{ Route::is('dash.jabatan') ? 'fa fa-circle' : 'fa fa-circle-o' }} text-primary"></i>
                                                    </td>
                                                    <td><a href="{{ route('dash.jabatan') }}">Jabatan</a></td>
                                                </tr>
                                                <tr>
                                                    <td width="1"><i
                                                            class="{{ Route::is('dash.kelompokKerja') ? 'fa fa-circle' : 'fa fa-circle-o' }} text-primary"></i>
                                                    </td>
                                                    <td><a href="{{ route('dash.kelompokKerja') }}">Kelompok Kerja</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="1"><i
                                                            class="{{ Route::is('dash.statusKerja') ? 'fa fa-circle' : 'fa fa-circle-o' }} text-primary"></i>
                                                    </td>
                                                    <td><a href="{{ route('dash.statusKerja') }}">Status Kerja</a></td>
                                                </tr>
                                                <tr>
                                                    <td width="1"><i
                                                            class="{{ Route::is('dash.statusKeluarga') ? 'fa fa-circle' : 'fa fa-circle-o' }} text-primary"></i>
                                                    </td>
                                                    <td><a href="{{ route('dash.statusKeluarga') }}">Status Keluarga</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="1"><i
                                                            class="{{ Route::is('dash.persentaseKinerja') ? 'fa fa-circle' : 'fa fa-circle-o' }} text-primary"></i>
                                                    </td>
                                                    <td><a href="{{ route('dash.persentaseKinerja') }}">Persentase
                                                            Kinerja</a></td>
                                                </tr>
                                                <tr>
                                                    <td width="1"><i
                                                            class="{{ Route::is('dash.nilaiKinerja') ? 'fa fa-circle' : 'fa fa-circle-o' }} text-primary"></i>
                                                    </td>
                                                    <td><a href="{{ route('dash.nilaiKinerja') }}">Nilai Kinerja</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="1"><i
                                                            class="{{ Route::is('dash.jamPerpekan') ? 'fa fa-circle' : 'fa fa-circle-o' }} text-primary"></i>
                                                    </td>
                                                    <td><a href="{{ route('dash.jamPerpekan') }}">Jml Jam Perpekan</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="1"><i
                                                            class="{{ Route::is('dash.tariflembur') ? 'fa fa-circle' : 'fa fa-circle-o' }} text-primary"></i>
                                                    </td>
                                                    <td><a href="{{ route('dash.tariflembur') }}">Tarif Lembur</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="1"><i
                                                            class="{{ Route::is('dash.bulkUpload') ? 'fa fa-circle' : 'fa fa-circle-o' }} text-primary"></i>
                                                    </td>
                                                    <td><a href="{{ route('dash.bulkUpload') }}">Bulk Upload</a></td>
                                                </tr>
                                                <tr>
                                                    <td width="1"><i
                                                            class="{{ Route::is('dash.device') ? 'fa fa-circle' : 'fa fa-circle-o' }} text-primary"></i>
                                                    </td>
                                                    <td><a href="{{ route('dash.device') }}">Fingerprint</a></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-lg-9">
                                    @if ($message = Session::get('success'))
                                    <div class="alert alert-success alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert"></button>
                                        {{$message}}
                                    </div>
                                    @endif
                                    @if ($message = Session::get('error'))
                                    <div class="alert alert-danger alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert"></button>
                                        {{$message}}
                                    </div>
                                    @endif

                                    @yield('content')
                                </div>
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
    <script src="{{ asset('js/circle-progress.min.js') }}"></script>
    <script src="{{ asset('js/d3.v3.min.js') }}"></script>
    <script src="{{ asset('js/c3.min.js') }}"></script>
    <script src="{{ asset('js/jquery.mask.min.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('js/selectize.min.js') }}"></script>
    <script src="{{ asset('js/toastr.min.js') }}"></script>
    @stack('scripts')
</body>

</html>
