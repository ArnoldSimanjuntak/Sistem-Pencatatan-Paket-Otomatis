@extends('layouts.app')

@section('title', 'Admin - Manajemen Pengguna')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0" style="font-weight: 600;">Manajemen Pengguna</h2>
        <a href="{{ route('admin.users.create') }}" class="btn btn-pln-primary">
            <i class="bi bi-person-plus-fill me-2"></i>Tambah Pengguna Baru
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            Daftar Akun Pengguna
        </div>
        <div class="table-responsive">
            <table class="table table-hover mb-0 align-middle table-pln">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Peran (Role)</th>
                        <th>Tanggal Dibuat</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if ($user->role == 'superadmin')
                                    <span class="badge bg-danger">Super Admin</span>
                                @else
                                    <span class="badge bg-success">Resepsionis</span>
                                @endif
                            </td>
                            <td>{{ $user->created_at->format('d M Y, H:i') }}</td>
                            <td class="text-center">
                                <form action="{{ route('admin.users.destroy', $user) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus akun ini? Tindakan ini tidak bisa dibatalkan.');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" {{ Auth::id() == $user->id ? 'disabled' : '' }}>
                                        <i class="bi bi-trash-fill"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-4">Tidak ada data pengguna.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if ($users->hasPages())
            <div class="card-footer bg-white">
                {{ $users->links() }}
            </div>
        @endif
    </div>
@endsection