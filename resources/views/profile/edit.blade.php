@extends('layouts.profile')
@section('content')
<div class="col-lg-8">
    <form class="card">
        <div class="card-body">
            <h3 class="card-title">Detail Profile</h3>
            <table class="table card-table table-striped table-vcenter">
                <tbody>
                    <tr>
                        <td>Nama Lengkap</td>
                        <td><strong>{{ $user->karyawan->nama_lengkap }}</strong></td>
                    </tr>
                    <tr>
                        <td>NIK</td>
                        <td><strong>{{ $user->karyawan->nik }}</strong></td>
                    </tr>
                    <tr>
                        <td>Tanggal Lahir</td>
                        <td>
                            {{ $user->karyawan->tempat_lahir . ', ' . date('d M Y', strtotime($user->karyawan->tanggal_lahir)) }}
                        </td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td><strong>{{ $user->karyawan->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</strong>
                        </td>
                    </tr>
                    <tr>
                        <td>Status Pernikahan</td>
                        <td><strong>{{ $user->karyawan->status_pernikahan == 'M' ? 'Menikah' : 'Belum Menikah' }}</strong>
                        </td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td><strong>{{ $user->karyawan->alamat }}</strong></td>
                    </tr>
                    <tr>
                        <td>No. HP</td>
                        <td><strong>{{ $user->karyawan->no_hp }}</strong></td>
                    </tr>
                    <tr>
                        <td>Golongan</td>
                        <td><strong>{{ $user->karyawan->golongan->kode_golongan }}</strong></td>
                    </tr>
                    <tr>
                        <td>Pendidikan Terakhir</td>
                        <td><strong>{{ $user->karyawan->pendidikan_terakhir }}</strong></td>
                    </tr>
                    <tr>
                        <td>Nama Pendidikan</td>
                        <td><strong>{{ $user->karyawan->nama_pendidikan }}</strong></td>
                    </tr>
                    <tr>
                        <td>Jurusan</td>
                        <td><strong>{{ $user->karyawan->jurusan }}</strong></td>
                    </tr>
                    <tr>
                        <td>Tahun Lulus</td>
                        <td><strong>{{ $user->karyawan->tahun_lulus }}</strong></td>
                    </tr>
                    <tr>
                        <td>Tanggal Masuk Kerja</td>
                        <td><strong>{{ $user->karyawan->tanggal_masuk }}</strong></td>
                    </tr>
                    @if ($user->status === '3')
                    <tr>
                        <td>Tanggal Keluar Kerja</td>
                        <td><strong>{{ $user->karyawan->tanggal_keluar }}</strong></td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
        {{-- <div class="card-footer text-right">
            <button type="submit" class="btn btn-primary">Update Profile</button>
        </div> --}}
    </form>
</div>
@endsection
