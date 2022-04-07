@extends('layouts.setting')
@section('content')
<form class="card" action="{{ route('dash.setting.update') }}" method="POST">
    @csrf
    @method('PUT')
    <div class="card-body">
        <h3 class="card-title">Konfigurasi Umum</h3>
        <div class="row">
            <div class="col">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <p><strong>Opps... Ada beberapa kesalahan</strong></p>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
        <div class="row">
            @forelse ($configs as $config)
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">{{ ucwords(str_replace('kehadiran', 'Tgl Kehadiran', str_replace('_', ' ',
                        $config->key))) }}</label>
                    <input type="text" name="{{ $config->key }}" class="form-control"
                        value="{{ old($config->key, $config->value) }}">
                    <small class="text-muted">{{ $config->keterangan }}</small>
                </div>
            </div>
            @empty
            Oops... Sepertinya ada sedikit masalah
            @endforelse
        </div>
    </div>
    <div class="card-footer text-right">
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
</form>
@endsection
