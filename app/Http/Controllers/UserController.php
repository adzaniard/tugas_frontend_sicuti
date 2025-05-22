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
    $response = Http::get("http://localhost:8080/user/{$id_user}");

    // Tambahkan debug sementara
    dd($response->status(), $response->json());
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
