<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.users', ['users' => $users]);
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => [
                'required',
                'confirmed',
                'min:8',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*#?&]).{8,}$/'
            ],
            'terms' => 'accepted',
        ], [
            'password.regex' => 'Password harus mengandung huruf besar, huruf kecil, angka, dan simbol, serta minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.users')->with('success', 'User berhasil ditambahkan');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', ['user' => $user]);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'current_password' => 'nullable',
            'password' => [
                'nullable',
                'confirmed',
                'min:8',
                // Kombinasi huruf besar, huruf kecil, angka, dan simbol
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*#?&]).{8,}$/',
            ],
            'terms' => 'sometimes|accepted',
        ], [
            'password.regex' => 'Password harus mengandung huruf besar, huruf kecil, angka, dan simbol, serta minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        // Jika user ingin mengganti password
        if ($request->filled('password')) {
            // Pastikan password lama diisi
            if (!$request->filled('current_password')) {
                return back()->withErrors([
                    'current_password' => 'Silakan masukkan password lama Anda terlebih dahulu.'
                ])->withInput();
            }

            // Cek apakah password lama benar
            if (!Hash::check($request->current_password, $user->password)) {
                return back()->withErrors([
                    'current_password' => 'Password lama yang Anda masukkan salah.'
                ])->withInput();
            }

            // Cek agar password baru tidak sama dengan password lama
            if (Hash::check($request->password, $user->password)) {
                return back()->withErrors([
                    'password' => 'Password baru tidak boleh sama dengan password lama.'
                ])->withInput();
            }

            // Simpan password baru
            $data['password'] = Hash::make($request->password);
        }

        // Update data user
        $user->update($data);

        return redirect()->route('admin.users')->with('success', 'User berhasil diperbarui.');
    }


    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect()->route('admin.users')->with('success', 'User berhasil dihapus');
    }
}
