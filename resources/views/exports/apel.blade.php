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
            <td>{{ json_encode($item->attendanceApel) }}</td>
            @foreach ($item->attendanceApel as $apel)
                <td>{{ $apel->hari }}</td>
                <td>{{ $apel->masuk }}</td>
                <td>{{ $apel->tanggal }}</td>
            @endforeach
        </tr>
        @endforeach
    </tbody>
</table>