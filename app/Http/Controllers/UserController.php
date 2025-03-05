<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //Tampilkan daftar user
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    // Tampilkan form tambah user
    public function create()
    {
        return view('users.create');
    }

    // Simpan user baru
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'nama' => 'required'
        ]);

        // Simpan dengan cara manual untuk memastikan tidak ada error mass assignment
        $user = new User();
        $user->email = $request->email;
        $user->nama = $request->nama;
        $user->save();

        return redirect()->route('users.index')->with('success', 'User berhasil ditambahkan.');
    }

    // Tampilkan form edit user
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    // Update user
    public function update(Request $request, $id)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email,' . $id,
            'nama' => 'required'
        ]);

        $user = User::findOrFail($id);
        $user->email = $request->email;
        $user->nama = $request->nama;
        $user->save(); // Simpan manual

        return redirect()->route('users.index')->with('success', 'User berhasil diperbarui.');
    }
    
    // Hapus user
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User berhasil dihapus.');
    }
}
