@extends('layouts.app')

@section('title', 'Edit Lamaran Pekerjaan')

@section('content')
<div class="container">
    <h1 class="mb-4">Edit Lamaran Pekerjaan</h1>

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
    <form action="{{ route('applications.update', $application->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="job_id" class="form-label">Lowongan Pekerjaan</label>
            <select name="job_id" id="job_id" class="form-control" required>
                @foreach ($jobs as $job)
                    <option value="{{ $job->id }}" {{ $application->job_id == $job->id ? 'selected' : '' }}>
                        {{ $job->job_title }} di {{ $job->company }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="applicant_name" class="form-label">Nama Pelamar</label>
            <input type="text" name="applicant_name" id="applicant_name" class="form-control" value="{{ $application->applicant_name }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $application->email }}" required>
        </div>

        <div class="mb-3">
            <label for="resume" class="form-label">Resume</label>
            <textarea name="resume" id="resume" class="form-control" rows="4" required>{{ $application->resume }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
        <a href="{{ route('applications.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
