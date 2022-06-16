<table>
    <thead>
        <tr>
            <th>No</th>
            <th>NIP</th>
            <th>No Rekening</th>
            <th>Nama Lengkap</th>
            <th>Bank</th>
            <th>Jml Gaji Bersih</th>
            <th>Gaji Pokok</th>
            <th>Tunj Jabatan</th>
            <th>Tunj Fungsional</th>
            <th>Tunj Struktural</th>
            <th>Tunj Kinerja</th>
            <th>Tunj Pendidikan</th>
            <th>Tunj Istri</th>
            <th>Tunj Anak</th>
            <th>Lembur</th>
            <th>Insentif</th>
            <th>Lainnya</th>
            <th>Potongan</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($rows as $row)
            <tr>
                <td>{{ $row['no'] }}</td>
                <td>{{ $row['nip'] }}</td>
                <td>{{ $row['no_rekening'] }}</td>
                <td>{{ $row['nama_lengkap'] }}</td>
                <td>{{ $row['bank'] }}</td>
                <td>{{ $row['jumlah'] }}</td>
                <td>{{ $row['gaji_pokok'] }}</td>
                <td>{{ $row['tunj_jabatan'] }}</td>
                <td>{{ $row['tunj_fungsional'] }}</td>
                <td>{{ $row['tunj_struktural'] }}</td>
                <td>{{ $row['tunj_kinerja'] }}</td>
                <td>{{ $row['tunj_pendidikan'] }}</td>
                <td>{{ $row['tunj_istri'] }}</td>
                <td>{{ $row['tunj_anak'] }}</td>
                <td>{{ $row['lembur'] }}</td>
                <td>{{ $row['insentif'] }}</td>
                <td>{{ $row['lainnya'] }}</td>
                <td>{{ $row['potongan'] }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
