<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\applications;
use App\Models\jobsss;

class ApplicationsController extends Controller
{
    // Menampilkan daftar semua aplikasi pekerjaan
    public function index()
    {
        $applications = applications::all();
        return view('applications.index', compact('applications'));
    }

    // Menampilkan form untuk membuat aplikasi pekerjaan baru
    public function create()
    {
        return view('applications.create');
    }

    // Menyimpan aplikasi pekerjaan baru
    public function store(Request $request)
    {
        $request->validate([
            'job_id' => 'required|exists:jobsss,id',
            'applicant_name' => 'required|string|max:255',
            'email' => 'required|email',
            'resume' => 'required|string',
        ]);

        applications::create($request->all());

        return redirect()->route('applications.index')
                         ->with('success', 'Aplikasi pekerjaan berhasil ditambahkan.');
    }

    // Menampilkan detail aplikasi pekerjaan
    public function show($id)
    {
        $application = applications::findOrFail($id);
        return view('applications.show', compact('application'));
    }

    // Menampilkan form edit aplikasi pekerjaan
    public function edit($id)
    {
        // Cari data lamaran berdasarkan ID
        $application = Applications::findOrFail($id);

        // Ambil daftar lowongan pekerjaan untuk dropdown
        $jobs = jobsss::all();

        $application = applications::findOrFail($id);
        return view('applications.edit', compact('application','jobs'));
    }

    // Memperbarui data aplikasi pekerjaan
    public function update(Request $request, $id)
    {
        $request->validate([
            'job_id' => 'required|exists:jobsss,id',
            'applicant_name' => 'required|string|max:255',
            'email' => 'required|email',
            'resume' => 'required|string',
        ]);

        $application = applications::findOrFail($id);
        $application->update($request->all());

        return redirect()->route('applications.index')
                         ->with('success', 'Aplikasi pekerjaan berhasil diperbarui.');
    }

    // Menghapus aplikasi pekerjaan
    public function destroy($id)
    {
        $application = applications::findOrFail($id);
        $application->delete();

        return redirect()->route('applications.index')
                         ->with('success', 'Aplikasi pekerjaan berhasil dihapus.');
    }
}
