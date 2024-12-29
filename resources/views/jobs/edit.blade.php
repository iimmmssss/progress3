@extends('layouts.app')

@section('title', 'Edit Lowongan Pekerjaan')

@section('content')
<div class="container">
    <h1 class="mb-4">Edit Lowongan Pekerjaan</h1>

    <!-- Tampilkan error validasi -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form Edit -->
    <form action="{{ route('jobs.update', $job->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="job_title" class="form-label">Judul Pekerjaan</label>
            <input type="text" name="job_title" id="job_title" class="form-control" value="{{ $job->job_title }}" required>
        </div>

        <div class="mb-3">
            <label for="company" class="form-label">Perusahaan</label>
            <input type="text" name="company" id="company" class="form-control" value="{{ $job->company }}" required>
        </div>

        <div class="mb-3">
            <label for="location" class="form-label">Lokasi</label>
            <input type="text" name="location" id="location" class="form-control" value="{{ $job->location }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea name="description" id="description" class="form-control" rows="4" required>{{ $job->description }}</textarea>
        </div>

        <div class="mb-3">
            <label for="salary" class="form-label">Gaji</label>
            <input type="number" name="salary" id="salary" class="form-control" value="{{ $job->salary }}">
        </div>

        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
        <a href="{{ route('jobs.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
