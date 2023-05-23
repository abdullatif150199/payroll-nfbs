@extends('layouts.main')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/select.dataTables.min.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/jquery.datetimepicker.css') }}">
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


        .select2-container--bootstrap4 .select2-selection--single {
            height: calc(2.25rem + 2px) !important
        }

        .select2-container--bootstrap4 .select2-selection--single .select2-selection__placeholder {
            color: #757575;
            line-height: 2.25rem
        }

        .select2-container--bootstrap4 .select2-selection--single .select2-selection__arrow {
            position: absolute;
            top: 50%;
            right: 3px;
            width: 20px
        }

        .select2-container--bootstrap4 .select2-selection--single .select2-selection__arrow b {
            top: 60%;
            border-color: #343a40 transparent transparent;
            border-style: solid;
            border-width: 5px 4px 0;
            width: 0;
            height: 0;
            left: 50%;
            margin-left: -4px;
            margin-top: -2px;
            position: absolute
        }

        .select2-container--bootstrap4 .select2-selection--single .select2-selection__rendered {
            line-height: 2.25rem
        }

        .select2-search--dropdown .select2-search__field {
            border: 1px solid #ced4da;
            border-radius: .25rem
        }

        .select2-results__message {
            color: #6c757d
        }

        .select2-container--bootstrap4 .select2-selection--multiple {
            min-height: calc(2.25rem + 2px) !important;
            height: calc(2.25rem + 2px) !important
        }

        .select2-container--bootstrap4 .select2-selection--multiple .select2-selection__rendered {
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            list-style: none;
            margin: 0;
            padding: 0 5px;
            width: 100%
        }

        .select2-container--bootstrap4 .select2-selection--multiple .select2-selection__choice {
            color: #343a40;
            border: 1px solid #bdc6d0;
            border-radius: .2rem;
            padding: 0;
            padding-right: 5px;
            cursor: pointer;
            float: left;
            margin-top: .3em;
            margin-right: 5px
        }

        .select2-container--bootstrap4 .select2-selection--multiple .select2-selection__choice__remove {
            color: #bdc6d0;
            font-weight: 700;
            margin-left: 3px;
            margin-right: 1px;
            padding-right: 3px;
            padding-left: 3px;
            float: left
        }

        .select2-container--bootstrap4 .select2-selection--multiple .select2-selection__choice__remove:hover {
            color: #343a40
        }

        .select2-container :focus {
            outline: 0
        }

        .select2-container--bootstrap4 .select2-selection {
            border: 1px solid #ced4da;
            border-radius: .25rem;
            width: 100%
        }

        .select2-container--bootstrap4.select2-container--focus .select2-selection {
            border-color: #17a2b8;
            -webkit-box-shadow: 0 0 0 .2rem rgba(0, 123, 255, .25);
            box-shadow: 0 0 0 .2rem rgba(0, 123, 255, .25)
        }

        .select2-container--bootstrap4.select2-container--focus.select2-container--open .select2-selection {
            border-bottom: none;
            border-bottom-left-radius: 0;
            border-bottom-right-radius: 0
        }

        select.is-invalid~.select2-container--bootstrap4 .select2-selection {
            border-color: #dc3545
        }

        select.is-valid~.select2-container--bootstrap4 .select2-selection {
            border-color: #28a745
        }

        .select2-container--bootstrap4 .select2-dropdown {
            border-color: #ced4da;
            border-top: none;
            border-top-left-radius: 0;
            border-top-right-radius: 0
        }

        .select2-container--bootstrap4 .select2-dropdown .select2-results__option[aria-selected=true] {
            background-color: #e9ecef
        }

        .select2-container--bootstrap4 .select2-results__option--highlighted,
        .select2-container--bootstrap4 .select2-results__option--highlighted.select2-results__option[aria-selected=true] {
            background-color: #007bff;
            color: #f8f9fa
        }

        .select2-container--bootstrap4 .select2-results__option[role=group] {
            padding: 0
        }

        .select2-container--bootstrap4 .select2-results__group {
            padding: 6px;
            display: list-item;
            color: #6c757d
        }

        .select2-container--bootstrap4 .select2-selection__clear {
            width: 1.2em;
            height: 1.2em;
            line-height: 1.15em;
            padding-left: .3em;
            margin-top: .5em;
            border-radius: 100%;
            background-color: #6c757d;
            color: #f8f9fa;
            float: right;
            margin-right: .3em
        }

        .select2-container--bootstrap4 .select2-selection__clear:hover {
            background-color: #343a40
        }
    </style>
@endpush
@section('content')
    <div class="row row-cards row-deck">
        <div class="ml-3 mb-2">
            <nav class="nav nav-pills flex-column flex-sm-row">
                <a class="flex-sm-fill text-sm-center nav-link p-1  {{ request()->is('dashboard/hafalan') ? 'active' : '' }}" href="/dashboard/hafalan">Setoran Terbaru</a>
                <a class="flex-sm-fill text-sm-center nav-link p-1  {{ request()->is('dashboard/hafalanDetail') ? 'active' : '' }}" href="/dashboard/hafalanDetail">Semua Setoran</a>
            </nav>
        </div>
        <div class="col-12">
            <div class="card">
                <form class="form-inline mt-5 ml-auto mr-3">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
                    <button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Search</button>
                </form>
                <div class="table-responsive">
                    <table class="table table-responsive-sm table-hover table-outline table-vcenter card-table"
                        id="hafalanTable">
                        <thead>
                            <tr class="text-center">
                                <th class="w-1">No. Induk</th>
                                <th>Nama Lengkap</th>
                                <th class="w-1">HAPALAN saat ini</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        @foreach($karyawans as $index => $karyawan)
                            <tr class="text-center">
                                <td>{{$karyawan->no_induk}}</td>
                                <td>{{$karyawan->nama_lengkap}}</td>
                                 <td>
                                    @if($karyawan->hapalan->isNotEmpty())
                                       Juz {{$karyawan->hapalan->last()['juz']}}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td><a href="/dashboard/hafalan/{{$karyawan->id}}" class="btn btn-primary text-white">Hafalan</a></td>
                            </tr>
                        @endforeach
                    </table>
                    <div class="my-5 text-center">
                        {{ $karyawans->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

