<!-- Daftar Pekerjaan -->
@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="text-primary">Daftar Lowongan Pekerjaan</h1>
        <div>
            <!-- Tombol untuk kembali ke dashboard -->
            <a href="{{ route('dashboard') }}" class="btn btn-secondary me-2">Kembali</a>
            
            <!-- Tombol untuk menambah lowongan pekerjaan baru -->
            <a href="{{ route('jobs.create') }}" class="btn btn-primary">Tambah Lowongan</a>
        </div>
    </div>

    <!-- Tabel untuk daftar lowongan pekerjaan -->
    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-striped table-hover align-middle text-center">
                <thead class="table-dark">
                    <tr>
                        <th>Jabatan</th>
                        <th>Perusahaan</th>
                        <th>Lokasi</th>
                        <th>Deskripsi</th>
                        <th>Gaji</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jobs as $job)
                        <tr>
                            <td>{{ $job->job_title }}</td>
                            <td>{{ $job->company }}</td>
                            <td>{{ $job->location }}</td>
                            <td>{{ Str::limit($job->description, 50) }}</td> <!-- Membatasi deskripsi -->
                            <td>{{ number_format($job->salary, 0, ',', '.') }}</td> <!-- Format gaji -->
                            <td class="d-flex justify-content-center gap-2">
                                <!-- Tombol untuk mengedit pekerjaan -->
                                <a href="{{ route('jobs.edit', $job->id) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                
                                <!-- Form untuk menghapus pekerjaan -->
                                <form action="{{ route('jobs.destroy', $job->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus lowongan ini?')">
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
