@extends('layouts.app')

@section('title', 'Admin - Tambah Pengguna Baru')

@section('content')
    <h2 class="mb-4" style="font-weight: 600;">Tambah Pengguna Baru</h2>

    <div class="card">
        <div class="card-header">
            <i class="bi bi-person-plus-fill me-2"></i>Formulir Pengguna
        </div>
        <div class="card-body">
            <form action="{{ route('admin.users.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="role" class="form-label">Peran (Role)</label>
                    <select id="role" name="role" class="form-select @error('role') is-invalid @enderror" required>
                        <option value="resepsionis" selected>Resepsionis</option>
                        <option value="superadmin">Super Admin</option>
                    </select>
                    @error('role')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>
                     @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
                     @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                    <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required>
                </div>

                <div class="d-flex justify-content-end">
                    <a href="{{ route('admin.index') }}" class="btn btn-secondary me-2">Batal</a>
                    <button type="submit" class="btn btn-pln-primary">
                        <i class="bi bi-save me-2"></i>Simpan Pengguna
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection