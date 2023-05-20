@extends('layouts.main')
@section('content')
<div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header text-center">
                    <div class="">
                        <a href="/hapalanCreate/{{ $karyawan->id }}" class="text-decoration-none btn btn-primary"><i class="bi bi-plus-lg"></i></a>
                    </div>
                    <!-- <div class="text-center">
                        <p>Detail Hafalan</p>
                    </div> -->
                </div>
                <div class="table-responsive">
                    <table class="table table-responsive-sm table-hover table-outline table-vcenter card-table"
                        id="hafalanTable">
                        <thead>
                            <tr>
                                <th class="w-1">No</th>
                                <th>Tanggal</th>
                                <th>JUZ</th>
                                <th class="w-1">DARI HALAMAN</th>
                                <th class="w-1">SAMPAI HALAMAN</th>
                                <th>SURAH</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($hafalans as $hafalan)  
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ to_hari(getDay($hafalan->tanggal)) }}, {{ yearMonth($hafalan->tanggal) }}</td>
                                <td>{{ $hafalan->juz}}</td>
                                <td>{{ $hafalan->dari_halaman}}</td>
                                <td>{{ $hafalan->sampai_halaman}}</td>
                                <td>{{ $hafalan->surat}}</td>
                                <td class="">
                                    <a href="/dashboard/{{ $karyawan->id }}/edit" class="btn btn-success p-1"><i class="bi bi-pencil"></i> Edit</a>
                                    <form action="/dashboard/{{ $karyawan->id}}" method="post" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger border-0" onclick="return confirm('are you sure?')"><i class="bi bi-trash3-fill"></i></button>
                                    </form>
                                </td>
                            </tr> 
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection