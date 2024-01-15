# APLIKASI PEMBAYARAN SPP

Aplikasi pembayaran SPP berbasis PHP prosedural.

## FITUR

Berdasarkan level:

- Login / Logout (admin, petugas, siswa)
- CRUD data admin, petugas, siswa, spp (admin)
- Entri transaksi pembayaran (admin, petugas)
- Lihat history pembayaran (admin, petugas, siswa)
- Generate laporan (admin?)

## STRUKTUR APLIKASI

- index.php : menu utama
- db.sql : skema database
- kelas/ spp/ petugas/ siswa/ : CRUD sesuai nama folder
- assets/ : CSS & JS
- helper/ : koneksi database dan pembantu session (dll)
- layout/ : struktur dasar setiap halaman
- sisanya sesuai nama filenya