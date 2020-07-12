@extends('layouts.profile')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/jquery.datetimepicker.css') }}">
@endpush

@section('content')
<div class="col-lg-8">
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert"></button>
        {{$message}}
    </div>
    @endif
    @if ($message = Session::get('error'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert"></button>
        {{$message}}
    </div>
    @endif
    <div class="card">
        <div class="card-header">
            Edit Cuti
        </div>
        <div class="card-body">
            <form action="{{ route('profile.editCuti', $data->id) }}" method="POST">
                @include('profile.cuti.form')

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/jquery.datetimepicker.full.min.js') }}"></script>
<script>
    $('.datepicker').datetimepicker({
        timepicker:false,
        format: 'Y-m-d'
    });
</script>
@endpush
