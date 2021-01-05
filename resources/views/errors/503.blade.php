@extends('layouts.error')
@section('content')
    <div class="container text-center">
        <div class="display-1 text-muted mb-5">
            <i class="si si-exclamation"></i> 503
        </div>
        <h1 class="h2 mb-3">
            Oops.. Server is unavailable.
        </h1>
        <p class="h4 text-muted font-weight-normal mb-7">
            Kami minta maaf, Layanan kami saat ini tidak tersedia...
        </p>
        <a class="btn btn-primary" href="{!! config('tabler.urls.homepage') !!}">
            <i class="fe fe-arrow-left mr-2"></i> Kembali
        </a>
    </div>
@endsection
