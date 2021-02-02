@extends('layouts.setting')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/select.dataTables.min.css') }}">
<style>
    .dataTables_length {
        padding-left: 1rem;
        padding-top: 1rem;
    }

    .dataTables_filter {
        padding-right: 1rem;
        padding-top: 1rem;
    }

    .dataTables_info {
        padding-left: 1rem;
        padding-bottom: 1rem;
    }

    .dataTables_paginate {
        padding-right: 1rem;
        padding-bottom: 1rem;
    }

    .paginate_button .page-link {
        padding: 0.3rem 0.5rem
    }
</style>
@endpush
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            Bulk Import
        </h3>
        <div class="card-options">
            <a href="/files/format_import.xlsx" class="btn btn-secondary" download="FormatImport">Download format
                excel</a>
        </div>
    </div>
    <div class="card-body">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif

        @if (isset($errors) && $errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
            {{ $error }}
            @endforeach
        </div>
        @endif

        <form action="{{ route('dash.bulkImport.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                {{-- <label class="form-label">Browse file</label> --}}
                <div class="row gutters-xs">
                    <div class="col">
                        <input type="file" name="file" class="form-control custom-file" required>
                    </div>
                    <span class="col-auto">
                        <button class="btn btn-primary" type="submit">
                            <i class="fe fe-upload"></i> Import data
                        </button>
                    </span>
                </div>
            </div>
        </form>

        @if (session()->has('failures'))
        <strong class="card-title text-danger">Mohon perbaiki kesalahan berikut pada file excel anda!</strong>
        <table class="table card-table table-vcenter text-nowra table-danger">
            <tr class="bg-danger">
                <th class="text-white">Baris</th>
                <th class="text-white">Kolom</th>
                <th class="text-white">Pesan Error</th>
                <th class="text-white">Isian</th>
            </tr>

            @foreach (session()->get('failures') as $validation)
            <tr>
                <td>{{ $validation->row() }}</td>
                <td>{{ $validation->attribute() }}</td>
                <td>
                    <ul>
                        @foreach ($validation->errors() as $e)
                        <li>{{ $e }}</li>
                        @endforeach
                    </ul>
                </td>
                <td>
                    {{ $validation->values()[$validation->attribute()] }}
                </td>
            </tr>
            @endforeach
        </table>
        @endif
    </div>
</div>

{{-- @include('bulk.modals') --}}

@endsection

@push('scripts')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#errorTable').DataTable();
</script>
@endpush
