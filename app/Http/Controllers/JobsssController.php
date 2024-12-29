<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\jobsss;

class JobsssController extends Controller
{
      // Menampilkan daftar semua pekerjaan
      public function index()
      {
          $jobs = jobsss::all();
          return view('jobs.index', compact('jobs'));
      }
  
      // Menampilkan form untuk membuat pekerjaan baru
      public function create()
      {
          return view('jobs.create');
      }
  
      // Menyimpan pekerjaan baru
      public function store(Request $request)
      {
          $request->validate([
            'job_title' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'description' => 'required|string',
            'salary' => 'required|numeric',
          ]);
  
          jobsss::create($request->all());
  
          return redirect()->route('jobs.index')
                           ->with('success', 'Pekerjaan berhasil ditambahkan.');
      }
  
      // Menampilkan detail pekerjaan
      public function show($id)
      {
          $job = jobsss::findOrFail($id);
          return view('jobs.show', compact('job'));
      }
  
      // Menampilkan form edit pekerjaan
      public function edit($id)
      {
          // Cari data berdasarkan ID
        $job = Jobsss::findOrFail($id);

        // Tampilkan halaman edit dengan data yang ditemukan
        return view('jobs.edit', compact('job'));
      }
  
      // Memperbarui data pekerjaan
      public function update(Request $request, $id)
      {
          $request->validate([
            'job_title' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'description' => 'required|string',
            'salary' => 'required|numeric',
          ]);
  
           // Cari data berdasarkan ID
          $job = Jobsss::findOrFail($id);

           // Update data
          $job->update($request->all());
           // Redirect kembali ke halaman daftar dengan pesan sukses
          $job = jobsss::findOrFail($id);
          $job->update($request->all());
  
          return redirect()->route('jobs.index')
                           ->with('success', 'Pekerjaan berhasil diperbarui.');
      }
  
      // Menghapus pekerjaan
      public function destroy($id)
      {
          $job = jobsss::findOrFail($id);
          $job->delete();
  
          return redirect()->route('jobs.index')
                           ->with('success', 'Pekerjaan berhasil dihapus.');
    }  
}
