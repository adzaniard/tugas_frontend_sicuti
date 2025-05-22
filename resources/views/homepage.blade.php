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
