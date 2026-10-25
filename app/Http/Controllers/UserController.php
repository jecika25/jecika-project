<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     * Modul Pertemuan 7: Menampilkan seluruh data user.
     */
    public function index(Request $request)
    {
        $query = User::query();

        // Fitur pencarian user (nama atau email)
        if ($request->filled('q')) {
            $search = $request->q;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        $users = $query->latest('id')->paginate(10)->withQueryString();

        $stats = [
            'total' => User::count(),
        ];

        return view('admin.user.index', compact('users', 'stats'));
    }

    /**
     * Show the form for creating a new resource.
     * Modul Pertemuan 7: Form tambah data user.
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     * Modul Pertemuan 7: Validasi input, hashing password, dan simpan User.
     */
    public function store(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'name'                  => 'required|string|max:100',
            'email'                 => 'required|email|unique:users,email',
            'password'              => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required',
        ], [
            'name.required'                  => 'Nama pengguna wajib diisi.',
            'name.max'                       => 'Nama pengguna maksimal 100 karakter.',
            'email.required'                 => 'Alamat email wajib diisi.',
            'email.email'                    => 'Format email tidak valid.',
            'email.unique'                   => 'Email ini sudah terdaftar pada sistem.',
            'password.required'              => 'Password wajib diisi saat membuat user baru.',
            'password.min'                   => 'Password minimal harus 8 karakter.',
            'password.confirmed'             => 'Konfirmasi password tidak cocok dengan password.',
            'password_confirmation.required' => 'Konfirmasi password wajib diisi.',
        ])->validate();

        // Enkripsi password menggunakan Hash::make() sesuai arahan modul
        $data = [
            'name'     => $validated['name'],
            'email'    => $validated['email'],
            'password' => Hash::make($validated['password']),
        ];

        User::create($data);

        return redirect()->route('user.index')
            ->with('success', 'Data user baru berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);
        return redirect()->route('user.edit', $user->id);
    }

    /**
     * Show the form for editing the specified resource.
     * Modul Pertemuan 7: Form edit data user.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     * Modul Pertemuan 7: Update data user dengan validasi & opsional ganti password.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        $rules = [
            'name'  => 'required|string|max:100',
            'email' => 'required|email|unique:users,email,' . $user->id . ',id',
        ];

        // Jika password diisi, lakukan validasi konfirmasi dan min:8
        if ($request->filled('password')) {
            $rules['password'] = 'required|string|min:8|confirmed';
        }

        $validated = Validator::make($request->all(), $rules, [
            'name.required'      => 'Nama pengguna wajib diisi.',
            'name.max'           => 'Nama pengguna maksimal 100 karakter.',
            'email.required'     => 'Alamat email wajib diisi.',
            'email.email'        => 'Format email tidak valid.',
            'email.unique'       => 'Email ini sudah terdaftar pada sistem.',
            'password.min'       => 'Password minimal harus 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok dengan password.',
        ])->validate();

        $updateData = [
            'name'  => $validated['name'],
            'email' => $validated['email'],
        ];

        // Update password hanya jika diinputkan
        if ($request->filled('password')) {
            $updateData['password'] = Hash::make($request->password);
        }

        $user->update($updateData);

        return redirect()->route('user.index')
            ->with('success', 'Data user berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     * Modul Pertemuan 7: Hapus data user.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user.index')
            ->with('success', 'Data user berhasil dihapus!');
    }
}
