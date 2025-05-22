<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah User</title>
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
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-10">
        <div class="bg-white shadow rounded-lg p-8 max-w-xl mt-7 mx-auto">
            <!-- Judul Tengah + Ikon -->
            <div class="flex items-center justify-center space-x-2 mb-6">
                <i data-feather="user-plus" class="w-6 h-6"></i>
                <h1 class="text-2xl font-bold text-center">Tambah User</h1>
            </div>

            <form action="{{ route('user.store') }}" method="POST" class="space-y-5">
                @csrf

                <!-- Password -->
                <div>
                    <label class="block text-sm font-medium mb-1">Password</label>
                    <input name="password" type="text" required class="w-full border border-gray-300 rounded px-3 py-2" />
                </div>

                <!-- Username -->
                <div>
                    <label class="block text-sm font-medium mb-1">Username</label>
                    <input name="username" type="text" required class="w-full border border-gray-300 rounded px-3 py-2" />
                </div>

                <!-- Level -->
                <div>
                    <label class="block text-sm font-medium mb-1">Level</label>
                    <input name="level" type="text" required class="w-full border border-gray-300 rounded px-3 py-2" />
                </div>

                <!-- Tombol Aksi -->
                <div class="flex justify-end space-x-2">
                    <a href="{{ route('user.index') }}" class="px-4 py-2 border rounded hover:bg-gray-100">Batal</a>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
                </div>
            </form>
        </div>
    </main>
</div>

<script>
    feather.replace();
</script>
</body>
</html>
