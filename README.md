<h1 align="center">
 <img width="200" alt="icon-with-text" src="https://github.com/user-attachments/assets/0e7e3489-110c-4b8f-a6b3-84cc160cdc83">
  <br>
</h1>

<h4 align="center">Website PPDB Veritas School</h4>

<p align="center">
  <a href="https://badge.fury.io/js/electron-markdownify">
    <img src="https://badge.fury.io/js/electron-markdownify.svg"
         alt="Gitter">
  </a>
  <a href="https://gitter.im/amitmerchant1990/electron-markdownify"><img src="https://badges.gitter.im/amitmerchant1990/electron-markdownify.svg"></a>
  <a href="https://saythanks.io/to/bullredeyes@gmail.com">
      <img src="https://img.shields.io/badge/SayThanks.io-%E2%98%BC-1EAEDB.svg">
  </a>
  <a href="https://www.paypal.me/AmitMerchant">
    <img src="https://img.shields.io/badge/$-donate-ff69b4.svg?maxAge=2592000&amp;style=flat">
  </a>
</p>

<p align="center">
  <a href="#fitur-utama">Fitur Utama</a> •
  <a href="#cara-menggunakan">Cara Menggunakan</a> •
  <a href="#instalasi">Instalasi</a> •
  <a href="#teknologi">Teknologi</a> •
  <a href="#kontribusi">Kontribusi</a> •
  <a href="#lisensi">Lisensi</a>
</p>

<img width="1920" height="1080" alt="readme-md-image" src="https://github.com/user-attachments/assets/d1411092-d2ca-414b-9295-f80360ec1157" />

## Fitur Utama

* **Pendaftaran Online** - Sistem pendaftaran siswa baru secara online yang mudah dan cepat
  - Form pendaftaran yang user-friendly dengan validasi real-time
  - Upload dokumen persyaratan (Foto, Akta Kelahiran, Kartu Keluarga, dll)
  
* **Dashboard Calon Siswa** - Panel khusus untuk calon siswa
  - Tracking status pendaftaran secara real-time
  - Notifikasi otomatis untuk setiap tahapan PPDB
  - Unduh formulir dan kartu ujian
  
* **Informasi PPDB Lengkap**
  - Jadwal pendaftaran, seleksi, dan pengumuman
  - Syarat dan ketentuan pendaftaran
  - Biaya pendidikan dan beasiswa
  - FAQ (Frequently Asked Questions)

* **Manajemen Data Pendaftar** - Panel admin untuk mengelola data
  - Verifikasi dokumen pendaftar
  - Export data ke Excel/PDF
  - Filter dan pencarian data pendaftar
  
* **Sistem Pembayaran Online**
  - Integrasi dengan payment gateway
  - Riwayat transaksi pembayaran
  - Generate bukti pembayaran otomatis

* **Pengumuman Hasil Seleksi**
  - Cek hasil seleksi dengan nomor pendaftaran
  - Notifikasi email/WhatsApp otomatis
  - Konfirmasi daftar ulang online

* **Multi-Jenjang Pendidikan**
  - Support untuk TK, SD, SMP, dan SMA
  - Kuota per kelas dapat dikonfigurasi
  
* **Responsive Design**
  - Tampilan optimal di desktop, tablet, dan mobile
  - Progressive Web App (PWA) ready

* **Keamanan Data**
  - Enkripsi data sensitif
  - Authentication & Authorization
  - Backup data otomatis

* **Laporan & Statistik**
  - Dashboard statistik pendaftar
  - Grafik perkembangan pendaftaran
  - Export laporan untuk keperluan administrasi

## Cara Menggunakan

### Untuk Calon Siswa/Orang Tua:

1. Kunjungi website PPDB Veritas School
2. Klik tombol "Daftar Sekarang"
3. Isi formulir pendaftaran dengan lengkap
4. Upload dokumen persyaratan yang diminta
5. Submit pendaftaran dan dapatkan nomor pendaftaran
6. Login ke dashboard untuk tracking status
7. Ikuti tahapan seleksi sesuai jadwal
8. Cek pengumuman hasil seleksi
9. Lakukan daftar ulang jika diterima

### Untuk Admin/Panitia PPDB:

1. Login ke admin panel dengan kredensial admin
2. Verifikasi dokumen pendaftar
3. Kelola jadwal dan pengumuman
4. Export data untuk keperluan administrasi
5. Generate laporan statistik pendaftaran

## Instalasi

Untuk menjalankan aplikasi ini di local development, Anda memerlukan [Git](https://git-scm.com) dan [Node.js](https://nodejs.org/en/download/) (yang sudah include [npm](http://npmjs.com)). Dari command line:
```bash
# Clone repository ini
$ git clone https://github.com/veritasschool/ppdb-website

# Masuk ke direktori repository
$ cd ppdb-website

# Install dependencies
$ npm install

# Setup environment variables
$ cp .env.example .env
# Edit file .env sesuai konfigurasi Anda

# Jalankan database migration
$ npm run migrate

# Jalankan aplikasi
$ npm run dev
```

> **Catatan**
> Pastikan Anda sudah menginstall database (MySQL/PostgreSQL) dan mengkonfigurasi file .env dengan benar.

## Teknologi yang Digunakan

Website ini dibangun menggunakan teknologi modern:

- **Frontend:**
  - [React.js](https://reactjs.org/) - UI Library
  - [Next.js](https://nextjs.org/) - React Framework
  - [Tailwind CSS](https://tailwindcss.com/) - CSS Framework
  - [Redux](https://redux.js.org/) - State Management

- **Backend:**
  - [Node.js](https://nodejs.org/) - Runtime Environment
  - [Express.js](https://expressjs.com/) - Web Framework
  - [Prisma](https://www.prisma.io/) - ORM Database
  
- **Database:**
  - [PostgreSQL](https://www.postgresql.org/) / [MySQL](https://www.mysql.com/)

- **Payment Gateway:**
  - [Midtrans](https://midtrans.com/) / [Xendit](https://www.xendit.co/)

- **Storage:**
  - [AWS S3](https://aws.amazon.com/s3/) / [Cloudinary](https://cloudinary.com/) - File Storage

- **Authentication:**
  - [NextAuth.js](https://next-auth.js.org/) - Authentication
  - [JWT](https://jwt.io/) - Token-based Auth

## Demo

Anda dapat mengunjungi demo website di: [https://ppdb.veritasschool.sch.id](https://ppdb.veritasschool.sch.id)

**Demo Credentials:**
- **Admin:** admin@veritas.sch.id / admin123
- **User:** demo@example.com / demo123

## Kontribusi

Kontribusi selalu diterima! Jika Anda ingin berkontribusi:

1. Fork repository ini
2. Buat branch fitur baru (`git checkout -b fitur-baru`)
3. Commit perubahan (`git commit -m 'Menambahkan fitur baru'`)
4. Push ke branch (`git push origin fitur-baru`)
5. Buat Pull Request

## Support

Jika Anda menemukan bug atau memiliki saran, silakan buat issue di [GitHub Issues](https://github.com/elnoahcc/ppdb-veritas-school/issues)

Atau hubungi kami di:
- Email: elnoahamm@gmail.com
- Website: [elnoahmanalu.web.app](https://elnoahmanalu.web.app)
- LinkedIn: [elnoahmanalu](https://linkedin.com/in/elnoahmanalu)

## Tim Pengembang

Website ini dikembangkan oleh **Elnoah Agustinus Markus Manalu**

- GitHub: [@elnoahcc](https://github.com/elnoahcc)
- Email: elnoahamm@gmail.com
- LinkedIn: [elnoahmanalu](https://linkedin.com/in/elnoahmanalu)

<h2 align="center">Lisensi</h2>
```
MIT License

Copyright (c) 2025 Elnoah

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
```

---

> Website: [elnoahmanalu.web.app](https://elnoahmanalu.web.app) &nbsp;&middot;&nbsp;
> GitHub: [@elnoahcc](https://github.com/elnoahcc) &nbsp;&middot;&nbsp;
> LinkedIn: [elnoahmanalu](https://linkedin.com/in/elnoahmanalu)