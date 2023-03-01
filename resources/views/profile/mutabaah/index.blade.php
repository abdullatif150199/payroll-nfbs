@extends('layouts.profile')

@section('content')
    <div class="col-lg-8">
        @if ($message = Session::get('success'))
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
        @endif
        <div class="card mb-3">
            <div class="card-body py-3">
                <div class="row">
                    <div class="col">
                        <a class="btn btn-primary" href="{{ route('profile.mutabaah.create') }}">
                            <i class="fe fe-plus"></i>
                        </a>
                    </div>
                    <div class="col">
                        <span>Pekan ini terisi : {{ $count }}</span>
                    </div>
                </div>
            </div>
        </div>

        @foreach ($data as $item)
            <div class="card mb-3">
                <div class="card-body py-3">
                    <div class="d-flex justify-content-between">
                        <h4>{{ to_hari(getDay($item->tanggal)) }}, {{ yearMonth($item->tanggal) }}</h4>
                        <div>
                            <a class="btn btn-primary btn-sm" href="{{ route('profile.mutabaah.edit', $item->id) }}">
                                <i class="fe fe-edit-2"></i>
                                Edit
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-footer py-3">
                    <div class="row">
                        <div class="col text-center">
                            <div class="text-muted">Shubuh</div>
                            <strong class="text-dark">
                                {{ $item->shubuh }}
                            </strong>
                        </div>
                        <div class="col text-center">
                            <div class="text-muted">Dhuha</div>
                            <strong class="text-dark">
                                {{ $item->dhuha }}
                            </strong>
                        </div>
                        <div class="col text-center">
                            <div class="text-muted">Tilawah</div>
                            <strong class="text-dark">
                                {{ $item->tilawah_quran }}
                            </strong>
                        </div>
                        <div class="col text-center">
                            <div class="text-muted">Qiyamul</div>
                            <strong class="text-dark">
                                {{ $item->qiyamul_lail }}
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
