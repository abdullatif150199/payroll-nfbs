<table>
    <thead>
        <tr>
            <th>No</th>
            <th>NIP</th>
            <th>Nama Lengkap</th>
            <th>Jml Gaji Bersih</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($rows as $row)
            <tr>
                <td>{{ $row['no'] }}</td>
                <td>{{ $row['nip'] }}</td>
                <td>{{ $row['nama_lengkap'] }}</td>
                <td>{{ $row['jumlah'] }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
