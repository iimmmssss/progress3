<!-- Create Lamaran Pekerjaan -->
@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="text-primary mb-4">Tambah Lamaran Pekerjaan</h1>

    <!-- Form Tambah Lamaran -->
    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('applications.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- ID Lowongan Pekerjaan -->
                <div class="mb-3">
                    <label for="job_id" class="form-label">ID Lowongan Pekerjaan</label>
                    <input type="text" id="job_id" name="job_id" class="form-control" placeholder="Masukkan ID lowongan pekerjaan" required>
                </div>

                <!-- Nama Pelamar -->
                <div class="mb-3">
                    <label for="applicant_name" class="form-label">Nama Pelamar</label>
                    <input type="text" id="applicant_name" name="applicant_name" class="form-control" placeholder="Masukkan nama lengkap pelamar" required>
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="Masukkan email pelamar" required>
                </div>

                <!-- Resume -->
                <div class="mb-3">
                    <label for="resume" class="form-label">Resume</label>
                    <input type="file" id="resume" name="resume" class="form-control" required>
                </div>

                <!-- Tombol Aksi -->
                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('applications.index') }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary">Kirim Lamaran</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
