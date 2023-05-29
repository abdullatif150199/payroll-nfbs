@extends('layouts.profile')

@section('content')
    <div class="col-lg-8">
    
        <div class="card mb-3">
            <div class="card-body py-3">
                <div class="row">
                    <div class="col text-center">
                        <h5>Berikut Adalah History Hafalan Anda</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col text-center">
                        <span>Pekan ini terisi : {{ $count }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col text-center">
                        <span class="text-success mx-2">Anda Sudah Menyetor {{ $halamanDiHapal }} Halaman Di Juz {{$juz}}</span> <br>
                        <span class="text-success mx-2">Tersisa {{$sisaHalaman}} Halaman Di Juz {{ $juz }} </span>
                    </div>
                </div>
            </div>
        </div>
        @if($data->count())
            @foreach ($data as $item)
                <div class="card mb-3">
                    <div class="card-body py-3">
                        <div class="d-flex justify-content-between">
                            <h4>{{ to_hari(getDay($item->tanggal)) }}, {{ yearMonth($item->tanggal) }}</h4>
                        </div>
                    </div>
                    <div class="card-footer py-3">
                        <div class="row">
                            <div class="col text-center">
                                <div class="text-muted">Juz</div>
                                <strong class="text-dark">
                                    {{ $item->juz }}
                                </strong>
                            </div>
                            <div class="col text-center">
                                <div class="text-muted">Dari Halaman</div>
                                <strong class="text-dark">
                                    {{ $item->dari_halaman }}
                                </strong>
                            </div>
                            <div class="col text-center">
                                <div class="text-muted">Sampai Halaman</div>
                                <strong class="text-dark">
                                    {{ $item->sampai_halaman }}
                                </strong>
                            </div>
                            <div class="col text-center">
                                <div class="text-muted">Surah</div>
                                <strong class="text-dark">
                                    {{ $item->surat }}
                                </strong>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="text-center">
                <p>Hafalan Anda Masih Kosong...</p>
            </div>
        @endif
        <div class="my-5 text-center">
            {{ $data->links() }}
        </div>
    </div>
@endsection
