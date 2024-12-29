<!-- Edit Profil -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center mb-4">Edit Profil</h1>

        <form action="{{ route('profile.update') }}" method="POST" class="shadow-lg p-4 rounded bg-white">
            @csrf
            @method('PATCH')

            <div class="mb-3">
                <label for="name" class="form-label">Nama Lengkap</label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="name" 
                    name="name" 
                    value="{{ old('name', auth()->user()->name) }}" 
                    required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input 
                    type="email" 
                    class="form-control" 
                    id="email" 
                    name="email" 
                    value="{{ old('email', auth()->user()->email) }}" 
                    required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password Baru (Opsional)</label>
                <input 
                    type="password" 
                    class="form-control" 
                    id="password" 
                    name="password">
                <small class="text-muted">Kosongkan jika tidak ingin mengubah password.</small>
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Konfirmasi Password Baru</label>
                <input 
                    type="password" 
                    class="form-control" 
                    id="password_confirmation" 
                    name="password_confirmation">
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ url()->previous() }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </div>
        </form>
    </div>
@endsection
