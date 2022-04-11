@extends('layouts.profile')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">
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
    <ul class="list-group">
        @foreach ($data as $item)
        <li class="list-group-item d-flex justify-content-between align-items-center mb-4">
            <div>
                <small>{{ yearMonth($item->bulan, 'H') }}</small>
                <h4>Rp {{ number_format($item->gaji_akhir) }}</h4>
            </div>
            <div class="dropdown">
                <button type="button" class="btn dropdown-toggle btn-info btn-pill"
                    data-toggle="dropdown">
                    Lainnya
                </button>
                <div class="dropdown-menu">
                    <a href="{{ route('profile.gaji.detail', $item->id) }}" class="dropdown-item"><i
                            class="dropdown-icon fe fe-list"></i>
                        Detail </a>
                    <a href="https://wa.me/{{ setting('no_whatsapp_komplain') }}?text=NIP{{$item->karyawan->no_induk . urlencode("
                        \n") }}Assalamu'alaikum..." target="_blank" class="dropdown-item"><i
                            class="dropdown-icon fe fe-message-square"></i>
                        Komplain </a>
                    <a href="{{ route('profile.gaji.slip', $item->id) }}" target="_blank" class="dropdown-item"><i
                            class="dropdown-icon fe fe-file-text"></i> Slip gaji </a>
                </div>
            </div>
        </li>
        @endforeach
    </ul>
    <div class="mt-2">
        {{ $data->links() }}
    </div>
</div>
@endsection
