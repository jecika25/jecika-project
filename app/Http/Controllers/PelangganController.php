<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Pelanggan::query();

        if ($request->filled('q')) {
            $search = $request->q;
            $query->where(function ($q) use ($search) {
                $q->where('first_name', 'like', "%{$search}%")
                  ->orWhere('last_name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%");
            });
        }

        if ($request->filled('gender') && $request->gender !== 'all') {
            $query->where('gender', $request->gender);
        }

        $pelanggans = $query->latest('pelanggan_id')->paginate(10)->withQueryString();

        $stats = [
            'total' => Pelanggan::count(),
            'male' => Pelanggan::where('gender', 'Male')->count(),
            'female' => Pelanggan::where('gender', 'Female')->count(),
        ];

        return view('admin.pelanggan.index', compact('pelanggans', 'stats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pelanggan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'birthday' => 'nullable|date',
            'gender' => 'nullable|in:Male,Female,Other',
            'email' => 'required|email|unique:pelanggan,email',
            'phone' => 'nullable|string|max:20',
        ], [
            'first_name.required' => 'Nama depan wajib diisi.',
            'last_name.required' => 'Nama belakang wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',
        ])->validate();

        Pelanggan::create($validated);

        return redirect()->route('pelanggan.index')
            ->with('success', 'Data pelanggan baru berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        return redirect()->route('pelanggan.edit', $pelanggan->pelanggan_id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        return view('admin.pelanggan.edit', compact('pelanggan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pelanggan = Pelanggan::findOrFail($id);

        $validated = Validator::make($request->all(), [
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'birthday' => 'nullable|date',
            'gender' => 'nullable|in:Male,Female,Other',
            'email' => 'required|email|unique:pelanggan,email,' . $pelanggan->pelanggan_id . ',pelanggan_id',
            'phone' => 'nullable|string|max:20',
        ], [
            'first_name.required' => 'Nama depan wajib diisi.',
            'last_name.required' => 'Nama belakang wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',
        ])->validate();

        $pelanggan->update($validated);

        return redirect()->route('pelanggan.index')
            ->with('success', 'Data pelanggan berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->delete();

        return redirect()->route('pelanggan.index')
            ->with('success', 'Data pelanggan berhasil dihapus!');
    }
}
