@extends('layouts.profile')
@push('styles')
    <style>
        .item:hover {
            background-color: rgb(239 246 255);
            border-radius: 0.375rem;
            text-decoration: none;
        }
    </style>
@endpush
@section('content')
<div class="col d-block d-md-none">
    <div class="row">
        <div class="col">
            <div class="p-2">
                <div class="text-muted"><small>Gaji Bulan {{ yearMonth($item->bulan, 'H') }}</small></div>
                <h3 class="font-weight-bold">Rp {{ $gajiFirst->gaji_akhir }}</h3>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body py-2">
                    <div class="row">
                        <a href="{{ route('profile.gaji.index') }}" class="col p-2 text-center item">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-wallet" width="44" height="44"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="#00b341" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M17 8v-3a1 1 0 0 0 -1 -1h-10a2 2 0 0 0 0 4h12a1 1 0 0 1 1 1v3m0 4v3a1 1 0 0 1 -1 1h-12a2 2 0 0 1 -2 -2v-12" />
                                <path d="M20 12v4h-4a2 2 0 0 1 0 -4h4" />
                            </svg>
                            <div class="text-secondary">Gaji</div>
                        </a>
                        <a href="{{ route('profile.lembur.index') }}" class="col p-2 text-center item">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-alarm" width="44" height="44"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="#6f32be" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <circle cx="12" cy="13" r="7" />
                                <polyline points="12 10 12 13 14 13" />
                                <line x1="7" y1="4" x2="4.25" y2="6" />
                                <line x1="17" y1="4" x2="19.75" y2="6" />
                            </svg>
                            <div class="text-secondary">Lembur</div>
                        </a>
                        <a href="{{ route('profile.kehadiran.index') }}" class="col p-2 text-center item">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-checkbox" width="44" height="44"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="#ff2825" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <polyline points="9 11 12 14 20 6" />
                                <path d="M20 12v6a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h9" />
                            </svg>
                            <div class="text-secondary">Kehadiran</div>
                        </a>
                        <a href="{{ route('profile.cuti.index') }}" class="col p-2 text-center item">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-off" width="44" height="44"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="#597e8d" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M14.274 10.291a4 4 0 1 0 -5.554 -5.58m-.548 3.453a4.01 4.01 0 0 0 2.62 2.65" />
                                <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 1.147 .167m2.685 2.681a4 4 0 0 1 .168 1.152v2" />
                                <line x1="3" y1="3" x2="21" y2="21" />
                            </svg>
                            <div class="text-secondary">Cuti</div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-8">
    <div class="card">
        <div class="card-header">
            Beranda
        </div>
        <div class="card-body">
            Informasi untuk pegawai,
            Pengumuman,
            dll. <strong>Segera hadir, ditunggu ya &#128526;</strong>
        </div>
    </div>
</div>
@endsection
