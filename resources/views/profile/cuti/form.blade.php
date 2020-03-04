@csrf
<div class="form-group">
    <label for="start_at">Dari tanggal:</label>
    <input type="text" name="start_at" class="@error('start_at') is-invalid @enderror form-control datepicker" value="{{ $data->start_at ?? null }}">
    @error('start_at')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="end_at">Sampai tanggal:</label>
    <input type="text" name="end_at" class="@error('end_at') is-invalid @enderror form-control datepicker" value="{{ $data->end_at ?? null }}">
    @error('end_at')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="end_at">Keterangan cuti:</label>
    <textarea name="ket" class="@error('ket') is-invalid @enderror form-control" rows="5">{{ $data->start_at ?? null }}</textarea>
    @error('ket')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
