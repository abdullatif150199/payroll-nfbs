<table>
    <thead>
        <tr>
            <th>NIP</th>
            <th>Nama</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $item)
        <tr>
            <td>{{ $item->no_induk }}</td>
            <td>{{ $item->nama_lengkap }}</td>
            <td>
                <tr>
                    <td>Hari</td>
                    <td>Masuk</td>
                    <td>Tanggal</td>
                </tr>
                @foreach ($item->attendanceApel as $apel)
                <tr>
                    <td>{{ to_hari($apel->hari) }}</td>
                    <td>{{ $apel->masuk }}</td>
                    <td>{{ $apel->tanggal }}</td>
                </tr>
                @endforeach
            </td>
        </tr>
        @endforeach
    </tbody>
</table>