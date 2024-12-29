@extends('layouts.app')

@section('content')
<div class="container text-center">
    <h1>Selamat Datang di Dashboard</h1>
    <p>Pilih salah satu menu berikut:</p>
    <div class="d-flex justify-content-center gap-4 mt-3">
        <a href="{{ route('jobs.index') }}" class="btn btn-primary">Lowongan Pekerjaan</a>
        <a href="{{ route('applications.index') }}" class="btn btn-secondary">Lamaran Pekerjaan</a>
        <a href="{{ route('profile.edit') }}" class="btn btn-info">Edit Profil</a>
        <a href="{{ route('logout') }}"
   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
   class="btn btn-danger">
   Logout
</a>

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>

    </div>
</div>
@endsection
