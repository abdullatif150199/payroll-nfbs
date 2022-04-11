@extends('layouts.profile')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/select.dataTables.min.css') }}">
<style>
    .dataTables_length {
        padding-left: 1rem;
        padding-top: 1rem;
    }

    .dataTables_filter {
        padding-right: 1rem;
        padding-top: 1rem;
    }

    .dataTables_info {
        padding-left: 1rem;
        padding-bottom: 1rem;
    }

    .dataTables_paginate {
        padding-right: 1rem;
        padding-bottom: 1rem;
    }

    .paginate_button .page-link {
        padding: 0.3rem 0.5rem
    }
</style>
@endpush
@section('content')
<div class="col-lg-8">
    @foreach ($data as $item)
        <div class="card mb-2">
            <div class="card-body py-3">
                <h4>{{ yearMonth($item->tanggal) }}</h4>
            </div>
            <div class="card-footer py-3">
                <div class="row">
                    <div class="col text-center">
                        <div class="text-muted">Masuk</div>
                        <strong class="text-dark">
                            {{ date('H:i', strtotime($item->jam_masuk)) }}
                        </strong>
                    </div>
                    <div class="col text-center">
                        <div class="text-muted">Istirahat</div>
                        <strong class="text-dark">
                            {{ date('H:i', strtotime($item->jam_istirahat)) }}
                        </strong>
                    </div>
                    <div class="col text-center">
                        <div class="text-muted">Kembali</div>
                        <strong class="text-dark">
                            {{ date('H:i', strtotime($item->jam_kembali)) }}
                        </strong>
                    </div>
                    <div class="col text-center">
                        <div class="text-muted">Pulang</div>
                        <strong class="text-dark">
                            {{ date('H:i', strtotime($item->jam_pulang)) }}
                        </strong>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <div class="mt-3">
        {{ $data->links() }}
    </div>
</div>
@endsection
