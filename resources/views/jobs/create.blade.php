<!-- Create Lowongan Pekerjaan -->
@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="text-primary mb-4">Tambah Lowongan Pekerjaan</h1>

    <!-- Form Tambah Lowongan -->
    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('jobs.store') }}" method="POST">
                @csrf
                
                <!-- Judul Pekerjaan -->
                <div class="mb-3">
                    <label for="job_title" class="form-label">Judul Pekerjaan</label>
                    <input type="text" id="job_title" name="job_title" class="form-control" placeholder="Masukkan judul pekerjaan" required>
                </div>

                <!-- Perusahaan -->
                <div class="mb-3">
                    <label for="company" class="form-label">Perusahaan</label>
                    <input type="text" id="company" name="company" class="form-control" placeholder="Masukkan nama perusahaan" required>
                </div>

                <!-- Lokasi -->
                <div class="mb-3">
                    <label for="location" class="form-label">Lokasi</label>
                    <input type="text" id="location" name="location" class="form-control" placeholder="Masukkan lokasi pekerjaan" required>
                </div>

                <!-- Deskripsi -->
                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi</label>
                    <textarea id="description" name="description" class="form-control" rows="4" placeholder="Masukkan deskripsi pekerjaan" required></textarea>
                </div>

                <!-- Gaji -->
                <div class="mb-3">
                    <label for="salary" class="form-label">Gaji</label>
                    <input type="text" id="salary" name="salary" class="form-control" placeholder="Masukkan gaji pekerjaan" required>
                </div>

                <!-- Tombol Simpan -->
                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('jobs.index') }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan Lowongan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
