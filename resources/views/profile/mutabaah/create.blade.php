@extends('layouts.profile')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/jquery.datetimepicker.css') }}">
@endpush

@section('content')
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                Isi Mutabaah
            </div>
            <div class="card-body">
                <form action="{{ route('profile.mutabaah.store') }}" method="POST">
                    @include('profile.mutabaah.form')

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
            timepicker: false,
            format: 'Y-m-d'
        });
    </script>
@endpush
