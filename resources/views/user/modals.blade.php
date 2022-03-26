{{-- Modal formUser --}}
<div class="modal fade" id="formUser">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="close" data-dismiss="modal"></button>
            </div>

            <form method="post">
                <div class="modal-body">
                    {{ csrf_field() }} {{ method_field('POST') }}
                    <input type="hidden" name="id">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label class="form-label">Username:</label>
                                <input type="text" name="username" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label class="form-label">Nama:</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label class="form-label">Email:</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                        </div>
                    </div> --}}
                    {{-- <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label class="form-label">Ulangi Password</label>
                                <input type="password" name="password_confirmation" class="form-control" required>
                            </div>
                        </div>
                    </div> --}}
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label class="form-label">Role atau Hak Akses Sebagai:</label>
                                @foreach ($roles as $key => $value)
                                    @if ($value != 'root')
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input id="role{{ $key }}" type="checkbox" name="roles[]" class="form-check-input" value="{{ $key }}">{{ $value }}
                                            </label>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Update</button>

                </div>
            </form>

        </div>
    </div>
</div>

<div class="modal fade" id="modalReset">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Reset Password</h4>
                <button type="button" class="close" data-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                Yakin ingin mereset password?
            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <form method="post">
                    {{ csrf_field() }}

                    <button type="submit" class="btn btn-primary">Yakin</button>
                </form>
            </div>

        </div>
    </div>
</div>
