Membuat Portal Lowongan Pekerjaan Di Herd Laravel
Deskripsi
Aplikasi portal lowongan pekerjaan sederhana menggunakan Laravel, dengan fitur CRUD untuk mengelola lowongan dan lamaran pekerjaan.
Fitur
1. CRUD Lowongan Pekerjaan
2. CRUD Lamaran Pekerjaan

Struktur Database
Tabel Jobs
- id: Primary key.
- job_title: Judul pekerjaan.
- company: Nama perusahaan.
- location: Lokasi pekerjaan.
- description: Deskripsi pekerjaan.
- salary: Gaji.

Tabel Applications
- id: Primary key.
- job_id: Foreign key ke tabel jobs.
- applicant_name: Nama pelamar.
- email: Email pelamar.
- resume: Path atau data singkat resume pelamar.

Penggunaan
- Akses /jobs untuk mengelola lowongan pekerjaan.
- Akses /applications untuk mengelola lamaran pekerjaan.

Konneksi Ke Data Base di env
- DB_CONNECTION=mysql
- DB_HOST=127.0.0.1
- DB_PORT=3306
- DB_DATABASE=job_portal
- DB_USERNAME=root
- DB_PASSWORD=