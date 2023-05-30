@extends('layouts.main')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/jquery.datetimepicker.css') }}">
@endpush

@section('content')
<div class="row">
        <div class="col-12">
            <div class="card">
                <div class="table-responsive">
                <div class="mx-3">
                        <form action="/dashboard/hafalan" method="post">
                        @csrf
                            <div class="mb-3 mt-3">
                                <label for="tanggal" class="form-label">Tanggal</label>
                                <input type="text" class="form-control @error('tanggal') is-invalid @enderror datepicker"  id="tanggal" name="tanggal" value="{{ old('tanggal') }}">
                                @error('tanggal')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="juz" class="form-label">Juz</label>
                                <select class="form-control @error('juz') is-invalid @enderror" id="juz" name="juz" value="{{ old('juz') }}">
                                    <option value="" selected>Pilih Juz </option>
                                    @for ($i = 1; $i <= 30; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                                @error('juz')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="dari_halaman" class="form-label">Dari Halaman</label>
                                <select class="form-control @error('dari_halaman') is-invalid @enderror" id="dari_halaman" name="dari_halaman" value="{{ old('dari_halaman') }}">
                                <option value="" selected></option>
                                </select>
                                @error('dari_halaman')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="sampai_halaman" class="form-label">Sampai Halaman</label>
                                <select class="form-control  @error('sampai_halaman') is-invalid @enderror" id="sampai_halaman" name="sampai_halaman" value="{{ old('sampai_halaman') }}">
                                </select>
                                @error('sampai_halaman')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="surat" class="form-label">Surah</label>
                                <input type="text" class="form-control  @error('surat') is-invalid @enderror" id="surat" name="surat" value="{{ old('surat') }}">
                                @error('surat')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3 d-none">
                                <input type="text" class="form-control" name="id" value="{{ $id }}">
                            </div>
                            
                            <button type="submit" class="btn btn-primary mb-3">Tambah Hafalan</button>
                        </form>
                    </div>
                </div>
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

    <script type="text/javascript">
        $(document).ready(function() {
            $('#juz').on('change', function() {
                var selectedJuz = $(this).val();

                $.ajax({
                    url: '{{ route("dash.hafalan.data") }}',
                    method: 'GET',
                    data: {
                        selectedValue: selectedJuz
                    },
                    success: function(response) {
                        var options = '';

                        $.each(response, function(index, value) {
                            options += '<option value="' + value + '">' + value + '</option>';
                        });

                        $('#dari_halaman').html(options);
                        $('#sampai_halaman').html(options);
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            });
        });
    </script>
@endpush