@extends('layouts.profile')

@section('content')
<div class="col-lg-8">
    @foreach ($data as $item)
        <div class="card mb-3">
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
    <div class="my-5 text-center">
        {{ $data->links() }}
    </div>
</div>
@endsection
