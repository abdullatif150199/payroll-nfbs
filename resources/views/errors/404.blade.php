@extends('layouts.error')
@section('content')
    <div class="container text-center">
        <div class="display-1 text-muted mb-5">
            <i class="si si-exclamation"></i> 404
        </div>
        <h1 class="h2 mb-3">
            Oops.. Page not found.
        </h1>
        <p class="h4 text-muted font-weight-normal mb-7">
            Kami minta maaf, halaman yang diminta tidak ditemukan...
        </p>
        <a class="btn btn-primary" href="{!! config('tabler.urls.homepage') !!}">
            <i class="fe fe-arrow-left mr-2"></i> Kembali
        </a>
    </div>
@endsection
