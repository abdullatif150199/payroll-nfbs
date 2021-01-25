<tr>
    <td>{{ $keluarga->nama }}</td>
    <td><strong>{{ $keluarga->statusKeluarga->status }}</strong></td>
    <td>
        <a class="icon mr-2" onclick="editInsentif({{ $data->id }})" title="edit">
            <i class="fe fe-edit"></i>
        </a>

        <a class="icon" onclick="hapusInsentif({{ $data->id }})" title="hapus">
            <i class="fe fe-trash"></i>
        </a>
    </td>
</tr>
