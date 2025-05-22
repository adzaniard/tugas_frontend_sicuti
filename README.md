
# Cara Membuat Project Frontend Laravel dengan Laragon QuickApp

## Prasyarat
- Laragon sudah terinstall
- Git sudah terinstall
- Composer sudah terinstall
- Backend(CodeIgniter) dan database sudah tersedia

---

## Langkah 1: Clone Repository Backend CodeIgniter

1. Buka terminal (cmd, Git Bash, atau terminal di VS Code).
2. Arahkan ke folder Laragon `www` (biasanya `C:\laragon\www`):
   ```bash
   cd C:\laragon\www
   ```
3. Clone repository backend:
   ```bash
   git clone https://github.com/Alledanaralle/PBF.git backend
   ```
4. Masuk ke folder backend hasil clone:
   ```bash
   cd backend
   ```
5. Jika menggunakan Composer (CI4), jalankan:
   ```bash
   composer install
   ```

---

## Langkah 2: Konfigurasi Database dan Koneksi Frontend ke Backend

### 3.1. Database
1. Download database dari repository berikut `https://github.com/andinardelinaa/Database_PengajuanCuti.git`.
2. Buka phpMyAdmin melalui Laragon.
3. Buat database baru dengan nama `cuti`.
4. Import database yang sudah didownload.


### 3.2. Koneksi API Backend (CI)

Sebelum frontend Laravel mengakses backend, pastikan API dari backend CodeIgniter berjalan dengan baik. Untuk itu, lakukan pengujian menggunakan Postman:

1. Jalankan backend CodeIgniter:
   ```bash
   php spark serve
   ```
2. Buat request baru di aplikasi Postman, contoh:
   ```
   GET http://localhost:8080/api/users
   ```


---

## Langkah 4: Membuat Project Laravel Frontend

### 4.1 Membuat Laravel dengan Laragon Quick App
1. Buka Laragon.
2. Klik kanan kemudian klik menu **Quick app** > pilih **Laravel**.
3. Masukkan nama project frontend, contoh `frontend`.
4. Klik **Create** dan tunggu proses pembuatan project selesai.

### 4.2 Membuat Tampilan
1. **Salin & edit file `.env`**  
   Salin file `.env.example` menjadi `.env`
   ```bash
   cp .env.example .env
   ```
   Ubah nilai SESSION_DRIVER menjadi:
   ```
   SESSION_DRIVER=file
   ```
2. Buat controller user
   ```
   php artisan make:controller UserController
   ```
   Edit `app/Http/Controllers/UserController.php` seperti ini:
   ```
   <?php
    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Http;

    class UserController extends Controller
    {
        // Tampilkan data user dari API
        public function index()
        {
            $response = Http::get('http://localhost:8080/user');

            if ($response->successful()) {
                $user = $response->json();
                return view('tampil_user', ['user' => $user]);
            }

            return back()->with('error', 'Gagal mengambil data user dari API');
        }
    }
    ?>
   ```
2. Buat view user
   ```
   php artisan make:view tampil_user
   ```
   Edit `app/Http/Controllers/UserController.php`
   ```
   <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8" />
        <title>Daftar User</title>
        @vite('resources/js/app.js')
    </head>
    <body class="bg-gray-100 text-gray-900">
        <div class="max-w-4xl mx-auto py-10 px-4">
            <h1 class="text-3xl font-bold mb-6">Daftar User</h1>

            @if ($users && count($users) > 0)
                <ul class="space-y-3">
                    @foreach ($users as $user)
                        <li class="p-4 bg-white shadow rounded">
                            Nama: {{ $user['nama'] }}
                        </li>
                    @endforeach
                </ul>
            @else
                <p>Tidak ada data user.</p>
            @endif
        </div>
    </body>
    </html>
   ```
3. Buka `routes/web.php` dan tambahkan menjadi:
   ```
   <?php
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\UserController;

    Route::get('/', function () {
        return view('homepage');
    })->name('homepage');

    Route::resource('user', UserController::class);
   ```
4. Jalankan Laravel
   ```
   composer instal
   ```
   Kemudian
   ```
   php artisan serve
   ```
---

**Selamat mencoba! 🚀**
