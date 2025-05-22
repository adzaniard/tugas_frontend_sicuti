# 🚀 Cara Membuat Project Frontend Laravel dengan Laragon QuickApp

## ✅ Prasyarat

* 🧰 Laragon sudah terpasang
* 🧪 Git sudah tersedia
* 🧩 Composer sudah terinstal
* 🔗 Backend (CodeIgniter) dan database sudah tersedia

---

## 🧾 Langkah 1: Clone Repository Backend CodeIgniter

1. Buat folder `SIKelompok3` di `C:\laragon\www\PBF\`, lalu buka di VS Code.
2. Buka terminal (cmd/Git Bash/VS Code Terminal).
3. Clone repository backend:

   ```bash
   git clone https://github.com/Alledanaralle/PBF.git backend
   ```
4. Masuk ke folder backend dan install dependensi jika diperlukan:

   ```bash
   cd backend
   composer install
   ```

---

## 🛠️ Langkah 2: Konfigurasi Database dan Koneksi Frontend ke Backend

### 💾 2.1. Setup Database

1. Download database dari: 
    ```https://github.com/andinardelinaa/Database_PengajuanCuti.git
    ```
2. Buka phpMyAdmin melalui Laragon.
3. Buat database baru bernama `cuti`.
4. Import file SQL yang sudah didownload.
5. Atau salin isi file `si_cuti (1).sql` ke SQL editor phpMyAdmin, dan tambahkan sebelum `CREATE TABLE admin`:

   ```sql
   CREATE DATABASE CUTI;
   USE CUTI;
   ```

### 🔌 2.2. Test API Backend (CI)

1. Jalankan server backend:

   ```bash
   php spark serve
   ```
2. Uji endpoint API di Postman:

   ```
   http://localhost:8080/users
   ```

---

## 🎯 Langkah 3: Buat Project Laravel Frontend

### ⚡ 3.1. Buat Laravel via Laragon Quick App

1. Buka Laragon.
2. Klik kanan > **www** > **Switch Document Root** > **Select Another** > pilih `C:\laragon\www\PBF\SIKelompok3` > klik **OK**.
3. Klik kanan > **Quick app** > pilih **Laravel**.
4. Masukkan nama project, misalnya: `frontend`.
5. Tunggu proses selesai.

### 🎨 3.2. Konfigurasi Tampilan dan Session

1. ⚙️ Buka file `.env`, ubah:

   ```env
   APP_URL=http://localhost:8080
   SESSION_DRIVER=file
   ```

2. Jalankan perintah berikut untuk membuat tampilan homepage:

   ```bash
   php artisan make:view homepage
   ```

3. Tambahkan isi ke `resources/views/homepage.blade.php` sebagai berikut.
   ```
   <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Tailwind CDN -->
        <script src="https://cdn.tailwindcss.com"></script>
        <!-- Heroicons CDN -->
        <script src="https://unpkg.com/feather-icons"></script>
    </head>
    <body class="bg-gray-100 text-gray-900">

        <div class="flex min-h-screen">

            <!-- Sidebar -->
            <aside class="w-64 bg-white shadow-md p-6 space-y-5">
                <h2 class="text-4xl font-bold text-blue-600 text-center mx-auto">SiCuti</h2>
                <nav class="space-y-4 ml-4">
                    <a href="{{ route('homepage') }}" class="flex items-center space-x-3 text-gray-700 hover:text-blue-600 font-medium">
                        <i data-feather="home" class="w-5 h-5"></i><span>Dashboard</span>
                    </a>
                    <a href="{{ route('user.index') }}" class="flex items-center space-x-3 text-gray-700 hover:text-blue-600 font-medium">
                        <i data-feather="user-check" class="w-5 h-5"></i><span>Data User</span>
                    </a>
                    <a href="{{ route('kajur.index') }}" class="flex items-center space-x-3 text-gray-700 hover:text-blue-600 font-medium">
                        <i data-feather="user" class="w-5 h-5"></i><span>Data Kajur</span>
                    </a>
                    <a href=".." class="flex items-center space-x-3 text-gray-700 hover:text-blue-600 font-medium">
                        <i data-feather="users" class="w-5 h-5"></i><span>Data Mahasiswa</span>
                    </a>
                    <a href=".." class="flex items-center space-x-3 text-gray-700 hover:text-blue-600 font-medium">
                        <i data-feather="calendar" class="w-5 h-5"></i><span>Data Cuti</span>
                    </a>
                </nav>
            </aside>

            <!-- Konten Utama -->
            <main class="flex-1 flex items-center justify-center">
                <div class="text-center">
                    <h1 class="text-4xl font-bold text-gray-800 mb-2">Selamat Datang</h1>
                    <p class="text-lg text-gray-600">Anda berada di halaman dashboard</p>
                </div>
            </main>

        </div>

        <!-- Inisialisasi Feather Icons -->
        <script>
            feather.replace();
        </script>

    </body>
    </html>

   ```

4. Buat tampilan user:

   ```bash
   php artisan make:view tampil_user
   ```

5. Tambahkan isi ke `resources/views/tampil_user.blade.php` sebagai berikut.
   ```
   <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Data User</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="https://unpkg.com/feather-icons"></script>
    </head>

    <body class="bg-gray-100 text-gray-900">

        <div class="flex min-h-screen">
            <!-- Sidebar -->
            <aside class="w-64 bg-white shadow-md p-6 space-y-5">
                <h2 class="text-4xl font-bold text-blue-600 text-center mx-auto">SiCuti</h2>
                <nav class="space-y-4 ml-4">
                    <a href="{{ route('homepage') }}" class="flex items-center space-x-3 text-gray-700 hover:text-blue-600 font-medium">
                        <i data-feather="home" class="w-5 h-5"></i><span>Dashboard</span>
                    </a>
                    <a href="{{ route('user.index') }}" class="flex items-center space-x-3 text-gray-700 hover:text-blue-600 font-medium">
                        <i data-feather="user-check" class="w-5 h-5"></i><span>Data User</span>
                    </a>
                    <a href="{{ route('kajur.index') }}" class="flex items-center space-x-3 text-gray-700 hover:text-blue-600 font-medium">
                        <i data-feather="user" class="w-5 h-5"></i><span>Data Kajur</span>
                    </a>
                    <a href=".." class="flex items-center space-x-3 text-gray-700 hover:text-blue-600 font-medium">
                        <i data-feather="users" class="w-5 h-5"></i><span>Data Mahasiswa</span>
                    </a>
                    <a href=".." class="flex items-center space-x-3 text-gray-700 hover:text-blue-600 font-medium">
                        <i data-feather="calendar" class="w-5 h-5"></i><span>Data Cuti</span>
                    </a>
                </nav>
            </aside>

            <!-- Main Content -->
            <main class="flex-1 p-8">
                <div class="w-full flex justify-center mb-6">
                    <h1 class="text-4xl font-bold text-center">. : Data User : .</h1>
                </div>

                <div class="bg-white rounded-lg shadow p-6">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-4 gap-4">
                        <!-- Tombol Tambah -->
                        <a href="{{ route('user.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 flex items-center space-x-2">
                            <i data-feather="plus" class="w-4 h-4"></i><span>Tambah User</span>
                        </a>

                        <!-- Input Pencarian -->
                        <input type="text" id="searchInput" placeholder="Cari user..." class="px-4 py-2 border border-gray-300 rounded shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400 w-70">
                    </div>
                    <!-- Table -->
                    <div class="rounded-lg overflow-x-auto">
                        <table class="min-w-full table-auto text-left text-gray-900 border-2">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="px-6 py-3">No.</th>
                                    <th class="px-6 py-3">ID User</th>
                                    <th class="px-6 py-3">Password</th>
                                    <th class="px-6 py-3">Username</th>
                                    <th class="px-6 py-3">Level</th>
                                    <th class="px-6 py-3">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="userTable">
                                @foreach ($user as $index => $usr)
                                <tr class="border-t hover:bg-blue-100 ">
                                    <td class="px-7 py-3">{{ $index + 1 }}</td>
                                    <td class="px-6 py-3">{{ $usr['id_user'] }}</td>
                                    <td class="px-6 py-3">{{ $usr['password'] }}</td>
                                    <td class="px-6 py-3">{{ $usr['username'] }}</td>
                                    <td class="px-6 py-3">{{ $usr['level'] }}</td>
                                    <td class="px-6 py-3 space-x-2">
                                        <a href="{{ url('/user/' . $usr['id_user'] . '/edit') }}" class="text-blue-600 hover:underline flex items-center space-x-1 inline-flex">
                                            <i data-feather="edit" class="w-4 h-4"></i><span>Edit</span>
                                        </a>
                                        <form action="{{ route('user.destroy', $usr['id_user']) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus user ini?')" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:underline flex items-center space-x-1">
                                                <i data-feather="trash-2" class="w-4 h-4"></i><span>Hapus</span>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
        </div>

        <script>
            feather.replace();

            // Pencarian Live
            const searchInput = document.getElementById('searchInput');
            const tableRows = document.querySelectorAll('#userTable tr');

            searchInput.addEventListener('input', function() {
                const keyword = this.value.toLowerCase();
                tableRows.forEach(row => {
                    const rowText = row.innerText.toLowerCase();
                    row.style.display = rowText.includes(keyword) ? '' : 'none';
                });
            });
        </script>

    </body>

    </html>
   ```

---

## 🧑‍💻 Langkah 4: Buat UserController Laravel

1. Buat controller:

   ```bash
   php artisan make:controller UserController
   ```

2. Tambahkan kode untuk mengakses API dan tampilkan data user sebagai berikut.
   
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

        public function create()
        {
            $response = Http::get('http://localhost:8080/user'); 

            if ($response->successful()) {
                $user = $response->json();
                return view('tambah_user', compact('user'));
            }
            return view('tambah_user', ['user' => []])->withErrors(['msg' => 'Gagal mengambil data user']);
        }

        // Simpan data user baru lewat API
        public function store(Request $request)
        {
            $request->validate([
                'password' => 'required|string',
                'username' => 'required|string',
                'level' => 'required|string',
            ]);

            $response = Http::asForm()->post('http://localhost:8080/user', $request->only('password', 'username', 'level'));

            if ($response->successful()) {
                return redirect()->route('user.index')->with('success', 'Data user berhasil ditambahkan');
            }

            return back()->with('error', 'Gagal menambahkan data user');
        }

        public function edit($id_user)
        {
            // Ambil data user berdasarkan ID User
            $response = Http::get("http://localhost:8080/user/{$id_user}");

            // Cek apakah kedua response berhasil
            if ($response->successful()) {
                $user = $response->json()[0];
                return view('edit_user', compact('user'));
            }
            return redirect()->back()->withErrors(['msg' => 'Gagal mengambil data user']);
        }


        // Update data user lewat API
        public function update(Request $request, $id_user)
        {
            $request->validate([
                'password' => 'required|string',
                'username' => 'required|string',
                'level' => 'required|string',
            ]);

            $response = Http::asForm()->put("http://localhost:8080/user/{$id_user}", $request->only('password', 'username', 'level'));

            if ($response->successful()) {
                return redirect()->route('user.index')->with('success', 'Data user berhasil diperbarui');
            }

            return back()->with('error', 'Gagal memperbarui data user');
        }

        // Hapus data user lewat API
        public function destroy($id_user)
        {
            $response = Http::delete("http://localhost:8080/user/{$id_user}");

            if ($response->successful()) {
                return redirect()->route('user.index')->with('success', 'Data user berhasil dihapus');
            }

            return back()->with('error', 'Gagal menghapus data user');
        }


    }
   ```

---

## ⚙️ Langkah 5: Modifikasi Backend CodeIgniter

1. Tambahkan route berikut di `app/Config/Routes.php`:

   ```php
   $routes->get('user/(:num)', 'User::show/$1');
   ```

2. Di file `app/Models/KajurModel.php`, ubah:

   ```php
   protected $useAutoIncrement = true;
   ```

---

## 🌐 Langkah 6: Atur Routing di Laravel

1. Buka `routes/web.php`, tambahkan:

   ```php
   use Illuminate\Support\Facades\Route;
   use App\Http\Controllers\UserController;
   use App\Http\Controllers\KajurController;

   Route::get('/', function () {
       return view('homepage');
   })->name('homepage');

   Route::resource('user', UserController::class);
   Route::resource('kajur', KajurController::class);
   ```

---

## ▶️ Langkah 7: Jalankan Aplikasi Laravel

1. Generate app key:

   ```bash
   php artisan key:generate
   ```

2. Jalankan server:

   ```bash
   php artisan serve
   ```

---

**Selamat mencoba dan semoga berhasil! 🚀** 
