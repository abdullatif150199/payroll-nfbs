@extends('layouts.main')
@section('content')
<div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="">
                        <a href="/dashboard/hafalanCreate/{{ $karyawan->id }}" class="text-decoration-none btn btn-primary"><i class="bi bi-plus-lg"></i></a>
                    </div>
                    <div class="row col-12 text-center justify-content-center">
                        <div class="col text-center">
                            <span>Pekan ini terisi : {{$count}}</span><br>
                            <span class="text-success mx-2">Hafalan Saat Ini Di Juz {{$juzTerakhir}}</span> 
                            <span class="text-success mx-2">Tersisa {{$sisaHalaman}} Halaman Di Juz {{ $juzTerakhir }} </span>
                        </div>
                    </div>
                </div>
                @if($hafalans->count())
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
                            @foreach ($hafalans as $hapalan)  
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ to_hari(getDay($hapalan->tanggal)) }}, {{ yearMonth($hapalan->tanggal) }}</td>
                                <td>{{ $hapalan->juz}}</td>
                                <td>{{ $hapalan->dari_halaman}}</td>
                                <td>{{ $hapalan->sampai_halaman}}</td>
                                <td>{{ $hapalan->surat}}</td>
                                <td class="">
                                    <a href="/dashboard/hafalan/{{ $hapalan->id }}/edit" class="badge bg-success p-3 text-white"><i class="bi bi-pencil"></i> Edit</a>
                                    <form action="/dashboard/hafalan/{{ $hapalan->id}}" method="post" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="badge bg-danger border-0 p-3 cursor-pointer" onclick="return confirm('yakin ingin menghaous item ini?')"><i class="bi bi-trash3-fill"></i></button>
                                    </form>
                                </td>
                            </tr> 
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <div class="text-center mt-5">
                    <p>Hafalan Masih Kosong...</p>
                </div>
                @endif
            </div>
            <div class="d-flex justify-content-center">
              {{ $hafalans->links() }}
            </div>
        
        </div>
    </div>

@endsection