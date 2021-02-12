@extends('layouts.setting')
@section('content')
<form class="card" action="{{ route('dash.setting.update') }}" method="POST">
    @csrf
    @method('PUT')
    <div class="card-body">
        <h3 class="card-title">Konfigurasi Umum</h3>
        <div class="row">
            @forelse ($configs as $config)
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">{{ $config->key }}</label>
                    <input type="text" name="value[{{ $config->key }}]" class="form-control"
                        value="{{ $config->value }}">
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
