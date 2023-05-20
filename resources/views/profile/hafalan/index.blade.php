@extends('layouts.profile')

@section('content')
    <div class="col-lg-8">
        <!-- @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert"></button>
                {{ $message }}
            </div>
        @endif
        @if ($message = Session::get('error'))
            <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert"></button>
                {{ $message }}
            </div>
        @endif -->
        <div class="card mb-3">
            <div class="card-body py-3">
                <div class="row">
                    <div class="col text-center">
                        <h3>Berikut Adalah History Hafalan Anda</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col text-center">
                        <span>Pekan ini terisi : {{ $count }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col text-center">
                        <span class="text-success mx-2">Hafalan Anda Saat Ini Di Juz 11</span> 
                        <span class="text-success mx-2">16 Halaman Lagi Untuk Selesai</span>
                    </div>
                </div>
                  <!-- <div class="col text-center">
                      <span class="text-success">16 Halaman Lagi Untuk Selesai</span>
                  </div> -->
                  <!-- <div class="col text-center">
                      <p>Pekan ini terisi : {{ $count }}</p>
                      <p class="text-success">Hafalan Anda Saat Ini Di Juz 11</p>
                      <p class="text-success">16 Halaman Lagi Untuk Selesai</p>
                  </div> -->
            </div>
        </div>

        @foreach ($data as $item)
            <div class="card mb-3">
                <div class="card-body py-3">
                    <div class="d-flex justify-content-between">
                        <h4>{{ to_hari(getDay($item->tanggal)) }}, {{ yearMonth($item->tanggal) }}</h4>
                        <!-- <div>
                            <a class="btn btn-primary btn-sm" href="{{ route('profile.mutabaah.edit', $item->id) }}">
                                <i class="fe fe-edit-2"></i>
                                Edit
                            </a>
                        </div> -->
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
        <div class="my-5 text-center">
            {{ $data->links() }}
        </div>
    </div>
@endsection
