<!-- Daftar Aplikasi Pekerjaan -->
@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="text-primary">Daftar Lamaran Pekerjaan</h1>
        <div>
            <!-- Tombol untuk kembali ke halaman sebelumnya -->
            <a href="{{ route('dashboard') }}" class="btn btn-secondary me-2">Kembali</a>
            
            <!-- Tombol untuk menambah aplikasi pekerjaan baru -->
            <a href="{{ route('applications.create') }}" class="btn btn-primary">Tambah Lamaran</a>
        </div>
    </div>

    <!-- Tabel daftar lamaran pekerjaan -->
    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-striped table-hover align-middle text-center">
                <thead class="table-dark">
                    <tr>
                        <th>ID Loker</th>
                        <th>Nama Pelamar</th>
                        <th>Email</th>
                        <th>Resume</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($applications as $application)
                        <tr>
                            <td>{{ $application->job_id }}</td>
                            <td>{{ $application->applicant_name }}</td>
                            <td>{{ $application->email }}</td>
                            <td>
                                <a href="{{ $application->resume }}" target="_blank" class="btn btn-link text-decoration-none">
                                    Lihat Resume
                                </a>
                            </td>
                            <td class="d-flex justify-content-center gap-2">
                                <!-- Tombol untuk mengedit aplikasi -->
                                <a href="{{ route('applications.edit', $application->id) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i> Edit
                                </a>

                                <!-- Form untuk menghapus aplikasi -->
                                <form action="{{ route('applications.destroy', $application->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus lamaran ini?')">
                                        <i class="fas fa-trash-alt"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
