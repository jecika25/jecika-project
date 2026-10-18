<?php

namespace App\Http\Controllers;

use App\Models\PaketCatering;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class PaketCateringController extends Controller
{
    /**
     * Kategori Jenis Paket yang tersedia
     */
    private array $jenisPaketOptions = [
        'Prasmanan',
        'Nasi Box',
        'Pernikahan',
        'Tumpeng',
        'Coffee Break',
        'Snack Box',
    ];

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = PaketCatering::query();

        // Search by Nama Paket, Deskripsi, or Fasilitas
        if ($request->filled('q')) {
            $search = $request->q;
            $query->where(function ($q) use ($search) {
                $q->where('nama_paket', 'like', "%{$search}%")
                  ->orWhere('deskripsi', 'like', "%{$search}%")
                  ->orWhere('fasilitas', 'like', "%{$search}%");
            });
        }

        // Filter by Jenis Paket
        if ($request->filled('jenis') && $request->jenis !== 'all') {
            $query->where('jenis_paket', $request->jenis);
        }

        // Filter by Status
        if ($request->filled('status') && $request->status !== 'all') {
            $query->where('status', $request->status);
        }

        $pakets = $query->latest('id')->paginate(8)->withQueryString();

        // Statistics
        $stats = [
            'total' => PaketCatering::count(),
            'tersedia' => PaketCatering::where('status', 'Tersedia')->count(),
            'prasmanan' => PaketCatering::where('jenis_paket', 'Prasmanan')->count(),
            'nasi_box' => PaketCatering::where('jenis_paket', 'Nasi Box')->count(),
        ];

        $jenisOptions = $this->jenisPaketOptions;

        return view('admin.paket.index', compact('pakets', 'stats', 'jenisOptions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jenisOptions = $this->jenisPaketOptions;
        return view('admin.paket.create', compact('jenisOptions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_paket' => 'required|string|max:150',
            'jenis_paket' => 'required|string|in:' . implode(',', $this->jenisPaketOptions),
            'harga_paket' => 'required|numeric|min:0',
            'minimal_porsi' => 'required|integer|min:1',
            'status' => 'required|in:Tersedia,Penuh / Pre-Order,Nonaktif',
            'deskripsi' => 'nullable|string|max:1500',
            'fasilitas' => 'nullable|string|max:1000',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ], [
            'nama_paket.required' => 'Nama paket catering wajib diisi.',
            'nama_paket.max' => 'Nama paket tidak boleh lebih dari 150 karakter.',
            'jenis_paket.required' => 'Silakan pilih jenis paket catering.',
            'jenis_paket.in' => 'Pilihan jenis paket tidak valid.',
            'harga_paket.required' => 'Harga paket wajib diisi.',
            'harga_paket.numeric' => 'Harga paket harus berupa angka valid.',
            'harga_paket.min' => 'Harga paket minimal Rp 0.',
            'minimal_porsi.required' => 'Minimal pemesanan porsi wajib diisi.',
            'minimal_porsi.min' => 'Minimal pemesanan setidaknya 1 porsi.',
            'status.required' => 'Status ketersediaan paket wajib dipilih.',
            'foto.image' => 'File yang diunggah harus berupa gambar.',
            'foto.mimes' => 'Format foto harus berupa JPG, PNG, atau WEBP.',
            'foto.max' => 'Ukuran foto maksimal 2 MB.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = $validator->validated();

        // Handle upload foto
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = 'paket_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $destination = public_path('uploads/paket');

            if (!File::exists($destination)) {
                File::makeDirectory($destination, 0755, true);
            }

            $file->move($destination, $filename);
            $data['foto'] = $filename;
        }

        PaketCatering::create($data);

        return redirect()->route('admin.paket.index')
            ->with('success', 'Paket catering baru "' . $data['nama_paket'] . '" berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $paket = PaketCatering::findOrFail($id);
        return redirect()->route('admin.paket.edit', $paket->id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $paket = PaketCatering::findOrFail($id);
        $jenisOptions = $this->jenisPaketOptions;
        return view('admin.paket.edit', compact('paket', 'jenisOptions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $paket = PaketCatering::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'nama_paket' => 'required|string|max:150',
            'jenis_paket' => 'required|string|in:' . implode(',', $this->jenisPaketOptions),
            'harga_paket' => 'required|numeric|min:0',
            'minimal_porsi' => 'required|integer|min:1',
            'status' => 'required|in:Tersedia,Penuh / Pre-Order,Nonaktif',
            'deskripsi' => 'nullable|string|max:1500',
            'fasilitas' => 'nullable|string|max:1000',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ], [
            'nama_paket.required' => 'Nama paket catering wajib diisi.',
            'jenis_paket.required' => 'Silakan pilih jenis paket catering.',
            'harga_paket.required' => 'Harga paket wajib diisi.',
            'harga_paket.numeric' => 'Harga paket harus berupa angka valid.',
            'minimal_porsi.required' => 'Minimal pemesanan porsi wajib diisi.',
            'status.required' => 'Status ketersediaan paket wajib dipilih.',
            'foto.image' => 'File yang diunggah harus berupa gambar.',
            'foto.mimes' => 'Format foto harus berupa JPG, PNG, atau WEBP.',
            'foto.max' => 'Ukuran foto maksimal 2 MB.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = $validator->validated();

        // Handle upload foto baru
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = 'paket_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $destination = public_path('uploads/paket');

            if (!File::exists($destination)) {
                File::makeDirectory($destination, 0755, true);
            }

            // Hapus foto lama jika tersimpan di uploads/paket
            if ($paket->foto && File::exists(public_path('uploads/paket/' . $paket->foto))) {
                File::delete(public_path('uploads/paket/' . $paket->foto));
            }

            $file->move($destination, $filename);
            $data['foto'] = $filename;
        }

        $paket->update($data);

        return redirect()->route('admin.paket.index')
            ->with('success', 'Data paket catering "' . $paket->nama_paket . '" berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $paket = PaketCatering::findOrFail($id);
        $nama = $paket->nama_paket;

        // Hapus foto jika tersimpan di uploads
        if ($paket->foto && File::exists(public_path('uploads/paket/' . $paket->foto))) {
            File::delete(public_path('uploads/paket/' . $paket->foto));
        }

        $paket->delete();

        return redirect()->route('admin.paket.index')
            ->with('success', 'Paket catering "' . $nama . '" berhasil dihapus!');
    }
}
