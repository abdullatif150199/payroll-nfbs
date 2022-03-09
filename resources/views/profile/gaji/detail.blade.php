@extends('layouts.profile')
@section('content')
<div class="col-lg-8">
    <div class="card">
        <div class="card-header">
            RINCIAN GAJI
        </div>
        <table class="table card-table table-striped table-vcenter">
            <thead>
                <tr class="text-center">
                    <th colspan="2">Bulan {{ yearMonth($gaji->bulan, 'H') }}</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        Gaji Pokok
                    </td>
                    <td class="text-right">
                        <strong>Rp. {{ number_format($gaji->gaji_pokok) }}</strong>
                    </td>
                </tr>
                <tr>
                    <td>
                        Tunjangan Jabatan
                    </td>
                    <td class="text-right">
                        <strong>Rp. {{ number_format($gaji->tunjangan_jabatan) }}</strong>
                    </td>
                </tr>
                <tr>
                    <td>
                        Tunjangan Fungsional
                    </td>
                    <td class="text-right">
                        <strong>Rp. {{ number_format($gaji->tunjangan_fungsional) }}</strong>
                    </td>
                </tr>
                <tr>
                    <td>
                        Tunjangan Struktural
                    </td>
                    <td class="text-right">
                        <strong>Rp. {{ number_format($gaji->tunjangan_struktural) }}</strong>
                    </td>
                </tr>
                <tr>
                    <td>
                        Tunjangan Kinerja
                    </td>
                    <td class="text-right">
                        <strong>Rp. {{ number_format($gaji->tunjangan_kinerja) }}</strong>
                    </td>
                </tr>
                <tr>
                    <td>
                        Tunjangan Pendidikan
                    </td>
                    <td class="text-right">
                        <strong>Rp. {{ number_format($gaji->tunjangan_pendidikan) }}</strong>
                    </td>
                </tr>
                <tr>
                    <td>
                        Tunjangan Istri
                    </td>
                    <td class="text-right">
                        <strong>Rp. {{ number_format($gaji->tunjangan_istri) }}</strong>
                    </td>
                </tr>
                <tr>
                    <td>
                        Tunjangan Anak
                    </td>
                    <td class="text-right">
                        <strong>Rp. {{ number_format($gaji->tunjangan_anak) }}</strong>
                    </td>
                </tr>
                <tr>
                    <td>
                        Insentif
                    </td>
                    <td class="text-right">
                        <strong>Rp. {{ number_format($gaji->insentif) }}</strong>
                    </td>
                </tr>
                <tr>
                    <td>
                        Lembur
                    </td>
                    <td class="text-right">
                        <strong>Rp. {{ number_format($gaji->lembur) }}</strong>
                    </td>
                </tr>
                <tr>
                    <td>
                        Lain-lain
                    </td>
                    <td class="text-right">
                        <strong>Rp. {{ number_format($gaji->lain_lain) }}</strong>
                    </td>
                </tr>
                <tr class="bg-info text-white">
                    <td>
                        GAJI TOTAL
                    </td>
                    <td class="text-right">
                        <strong>Rp. {{ number_format($gaji->gaji_total) }}</strong>
                    </td>
                </tr>
                <tr>
                    <td>
                        Potongan
                    </td>
                    <td class="text-right">
                        <strong>Rp. {{ number_format($gaji->sum_potongan) }}</strong>
                    </td>
                </tr>
                <tr class="bg-info text-white">
                    <td>
                        GAJI AKHIR
                    </td>
                    <td class="text-right">
                        <strong>Rp. {{ number_format($gaji->gaji_akhir) }}</strong>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
