<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Data Kajur</title>
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
        <main class="flex-1 p-8">
            <div class="w-full flex justify-center mb-6">
                <h1 class="text-4xl font-bold text-center">. : Data Kajur : .</h1>
            </div>

            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-4 gap-4">
                    <!-- Tombol Tambah -->
                    <a href="{{ route('kajur.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 flex items-center space-x-2">
                        <i data-feather="plus" class="w-4 h-4"></i><span>Tambah Kajur</span>
                    </a>

                    <!-- Input Pencarian -->
                    <input type="text" id="searchInput" placeholder="Cari kajur..." class="px-4 py-2 border border-gray-300 rounded shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400 w-70">
                </div>
                <!-- Table -->
                <div class="rounded-lg overflow-x-auto">
                    <table class="min-w-full table-auto text-left text-gray-900 border-2">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-6 py-3">No.</th>
                                <th class="px-6 py-3">ID Kajur</th>
                                <th class="px-6 py-3">Nama Kajur</th>
                                <th class="px-6 py-3">NIDN</th>
                                <th class="px-6 py-3">Nama Jurusan</th>
                                <th class="px-6 py-3">Username</th>
                                <th class="px-6 py-3">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="kajurTable">
                            @foreach ($kajur as $index => $kjr)
                            <tr class="border-t hover:bg-blue-100 ">
                                <td class="px-7 py-3">{{ $index + 1 }}</td>
                                <td class="px-6 py-3">{{ $kjr['id_kajur'] }}</td>
                                <td class="px-6 py-3">{{ $kjr['nama_kajur'] }}</td>
                                <td class="px-6 py-3">{{ $kjr['nidn'] }}</td>
                                <td class="px-6 py-3">{{ $kjr['nama_jurusan'] }}</td>
                                <td class="px-6 py-3">{{ $kjr['username'] }}</td>
                                <td class="px-6 py-3 space-x-2">
                                    <a href="{{ url('/kajur/' . $kjr['id_kajur'] . '/edit') }}" class="text-blue-600 hover:underline flex items-center space-x-1 inline-flex">
                                        <i data-feather="edit" class="w-4 h-4"></i><span>Edit</span>
                                    </a>
                                    <form action="{{ route('kajur.destroy', $kjr['id_kajur']) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus kajur ini?')" class="inline">
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
        const tableRows = document.querySelectorAll('#kajurTable tr');

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