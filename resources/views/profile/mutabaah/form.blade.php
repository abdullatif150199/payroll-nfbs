@csrf
<div class="form-group">
    <label for="tanggal">Tanggal:</label>
    <input type="text" name="tanggal" class="@error('tanggal') is-invalid @enderror form-control datepicker"
        value="{{ $data->tanggal ?? null }}">
    @error('tanggal')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="shubuh">Shubuh Berjamaah:</label>
    <select name="shubuh" class="form-control">
        <option value="ya" {{ isset($data) ? ($data->shubuh == 'ya' ? 'selected' : '') : '' }}>Ya</option>
        <option value="tidak" {{ isset($data) ? ($data->shubuh == 'tidak' ? 'selected' : '') : '' }}>Tidak</option>
    </select>
    @error('shubuh')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="dhuha">Dhuha:</label>
    <select name="dhuha" class="form-control">
        <option value="ya" {{ isset($data) ? ($data->dhuha == 'ya' ? 'selected' : '') : '' }}>Ya</option>
        <option value="tidak" {{ isset($data) ? ($data->dhuha == 'tidak' ? 'selected' : '') : '' }}>Tidak</option>
        <option value="haid" {{ isset($data) ? ($data->dhuha == 'haid' ? 'selected' : '') : '' }}>Haid</option>
    </select>
    @error('dhuha')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="tilawah_quran">Tilawah Quran:</label>
    <select name="tilawah_quran" class="form-control">
        <option value="ya" {{ isset($data) ? ($data->tilawah_quran == 'ya' ? 'selected' : '') : '' }}>Ya</option>
        <option value="tidak" {{ isset($data) ? ($data->tilawah_quran == 'tidak' ? 'selected' : '') : '' }}>Tidak
        </option>
        <option value="haid" {{ isset($data) ? ($data->tilawah_quran == 'haid' ? 'selected' : '') : '' }}>Haid
        </option>
    </select>
    @error('tilawah_quran')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="qiyamul_lail">Qiyamul Lail:</label>
    <select name="qiyamul_lail" class="form-control">
        <option value="ya" {{ isset($data) ? ($data->qiyamul_lail == 'ya' ? 'selected' : '') : '' }}>Ya</option>
        <option value="tidak" {{ isset($data) ? ($data->qiyamul_lail == 'tidak' ? 'selected' : '') : '' }}>Tidak
        </option>
        <option value="haid" {{ isset($data) ? ($data->qiyamul_lail == 'haid' ? 'selected' : '') : '' }}>Haid
        </option>
    </select>
    @error('qiyamul_lail')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
