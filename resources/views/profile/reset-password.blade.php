@extends('layouts.profile')
@section('content')
<div class="col-lg-8">
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert"></button>
        {{$message}}
    </div>
    @endif
    @if ($message = Session::get('error'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert"></button>
        {{$message}}
    </div>
    @endif
    <form action="{{ route('profile.reset-password') }}" class="card" method="POST">
        @csrf
        <div class="card-body p-6">
            <div class="card-title">Ganti Password</div>
            <div class="form-group">
                <label for="current_password" class="form-label">Password saat ini</label>
                <input type="password" name="current_password" class="form-control" required>
                @error('current_password')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <div class="form-group">
                <label for="password" class="form-label">Password baru</label>
                <input type="password" name="password" class="form-control" required>
                @error('password')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <div class="form-group">
                <label for="confirm_password" class="form-label">Ulangi Password baru</label>
                <input type="password" name="confirm_password" class="form-control" required>
                @error('confirm_password')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
            </div>
            <div class="form-footer">
                <button type="submit" class="btn btn-primary">Reset Password</button>
            </div>
        </div>
    </form>
</div>
@endsection