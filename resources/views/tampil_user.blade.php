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
        <aside class="w-64 bg-white shadow-md p-6 space-y-4">
            <h2 class="text-2xl font-bold text-blue-600 mb-6">SiCuti</h2>
            <nav class="space-y-4">
                <a href="{{ route('homepage') }}" class="flex items-center space-x-3 text-gray-700 hover:text-blue-600 font-medium">
                    <i data-feather="home" class="w-5 h-5"></i>
                    <span>Dashboard</span>
                </a>
                <a href="{{ route('user.index') }}" class="flex items-center space-x-3 text-gray-700 hover:text-blue-600 font-medium">
                    <i data-feather="user-check" class="w-5 h-5"></i>
                    <span>Data User</span>
                </a>
                <a href=".." class="flex items-center space-x-3 text-gray-700 hover:text-blue-600 font-medium">
                    <i data-feather="shield" class="w-5 h-5"></i>
                    <span>Data Kajur</span>
                </a>
                <a href=".." class="flex items-center space-x-3 text-gray-700 hover:text-blue-600 font-medium">
                    <i data-feather="users" class="w-5 h-5"></i>
                    <span>Data Mahasiswa</span>
                </a>
                <a href=".." class="flex items-center space-x-3 text-gray-700 hover:text-blue-600 font-medium">
                    <i data-feather="calendar" class="w-5 h-5"></i>
                    <span>Data Cuti</span>
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-8">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-bold">Data User</h1>
                <a href="{{ route('user.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 flex items-center space-x-2">
                    <i data-feather="plus" class="w-4 h-4"></i>
                    <span>Tambah User</span>
                </a>
            </div>

            <!-- Tabel Data Dosen -->
            <div class="bg-white rounded-lg shadow overflow-x-auto">
                <table class="min-w-full table-auto text-left text-gray-900">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-3">ID User</th>
                            <th class="px-6 py-3">Password</th>
                            <th class="px-6 py-3">Username</th>
                            <th class="px-6 py-3">Level</th>
                            <th class="px-6 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $usr)
                        <tr class="border-t">
                            <td class="px-6 py-3">{{ $usr['id_user'] }}</td>
                            <td class="px-6 py-3">{{ $usr['password'] }}</td>
                            <td class="px-6 py-3">{{ $usr['username'] }}</td>
                            <td class="px-6 py-3">{{ $usr['level'] }}</td>
                            <td class="px-6 py-3 space-x-2">
                                <a href="{{ route('user.edit',  $usr['id_user']) }}" class="text-blue-600 hover:underline flex items-center space-x-1 inline-flex">
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
        </main>
    </div>

    <script>
        feather.replace();
    </script>

</body>

</html>