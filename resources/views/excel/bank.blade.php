<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Bank</th>
            <th>No Rekening</th>
            <th>Nama Pemilik Rekening</th>
            <th>Keterangan</th>
            <th>Jml Gaji Yang Ditransfer</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($rows as $row)
            <tr>
                <td>{{ $row['no'] }}</td>
                <td>{{ $row['bank'] }}</td>
                <td>{{ $row['no_rekening'] }}</td>
                <td>{{ $row['atas_nama'] }}</td>
                <td>{{ $row['keterangan'] }}</td>
                <td>{{ $row['jumlah'] }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
