<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class KajurController extends Controller
{
    // Tampilkan data kajur dari API
    public function index()
    {
        // Ambil data kajur
        $kajurResponse = Http::get('http://localhost:8080/kajur');
        // Ambil data user
        $userResponse = Http::get('http://localhost:8080/user');

        // Pastikan keduanya sukses
        if ($kajurResponse->successful() && $userResponse->successful()) {
            $kajurList = $kajurResponse->json();
            $userList = collect($userResponse->json());

            // Loop data kajur, lalu tambahkan field username dari data user
            $kajurWithUsername = collect($kajurList)->map(function ($kajur) use ($userList) {
                $user = $userList->firstWhere('id_user', $kajur['id_user']);
                $kajur['username'] = $user['username'] ?? 'Tidak ditemukan';
                return $kajur;
            });

            return view('tampil_kajur', ['kajur' => $kajurWithUsername]);
        }

        return back()->with('error', 'Gagal mengambil data dari API');
    }


    public function create()
    {
        $kajurResponse = Http::get('http://localhost:8080/kajur'); // Ambil data kajur
        $userResponse = Http::get('http://localhost:8080/user');   // Ambil data user

        // Cek apakah keduanya berhasil
        if ($kajurResponse->successful() && $userResponse->successful()) {
            $kajur = $kajurResponse->json(); // decode data kajur
            $user = $userResponse->json();   // decode data user

            // Kirim ke view 'tambah_kajur.blade.php' sebagai variabel $kajur dan $user
            return view('tambah_kajur', compact('kajur', 'user'));
        }

        // Jika salah satu gagal, tetap kirim view tapi kosong
        return view('tambah_kajur', ['kajur' => [], 'user' => []])
            ->withErrors(['msg' => 'Gagal mengambil data dari API']);
    }

    // Simpan data kajur baru lewat API
    public function store(Request $request)
    {
        $request->validate([
            'nama_kajur' => 'required|string',
            'nidn' => 'required|string',
            'nama_jurusan' => 'required|string',
            'id_user' => 'required|integer',
        ]);

        $response = Http::asForm()->post('http://localhost:8080/kajur', $request->only('nama_kajur', 'nidn', 'nama_jurusan', 'id_user'));

        if ($response->successful()) {
            return redirect()->route('kajur.index')->with('success', 'Data kajur berhasil ditambahkan');
        }

        return back()->with('error', 'Gagal menambahkan data kajur');
    }

    public function edit($id_kajur)
    {
        $kajurResponse = Http::get("http://localhost:8080/kajur/{$id_kajur}");
        $userResponse = Http::get("http://localhost:8080/user");

        if ($kajurResponse->successful() && $userResponse->successful()) {
            $kajur = $kajurResponse->json()[0];
            $user = $userResponse->json();

            return view('edit_kajur', compact('kajur', 'user'));
        }

        return redirect()->back()->withErrors(['msg' => 'Gagal mengambil data']);
    }



    // Update data kajur lewat API
    public function update(Request $request, $id_kajur)
    {
        $request->validate([
            'nama_kajur' => 'required|string',
            'nidn' => 'required|string',
            'nama_jurusan' => 'required|string',
            'id_user' => 'required|integer',
        ]);

        $response = Http::asForm()->put("http://localhost:8080/kajur/{$id_kajur}", $request->only('nama_kajur', 'nidn', 'nama_jurusan', 'id_user'));

        if ($response->successful()) {
            return redirect()->route('kajur.index')->with('success', 'Data kajur berhasil diperbarui');
        }

        return back()->with('error', 'Gagal memperbarui data kajur');
    }

    // Hapus data kajur lewat API
    public function destroy($id_kajur)
    {
        $response = Http::delete("http://localhost:8080/kajur/{$id_kajur}");

        if ($response->successful()) {
            return redirect()->route('kajur.index')->with('success', 'Data kajur berhasil dihapus');
        }

        return back()->with('error', 'Gagal menghapus data kajur');
    }
}
