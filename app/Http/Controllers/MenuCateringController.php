<?php

namespace App\Http\Controllers;

use App\Models\MenuCatering;
use App\Models\Pelanggan;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class MenuCateringController extends Controller
{
    /**
     * Display a listing of the catering menus for Admin.
     */
    public function index(Request $request)
    {
        $query = MenuCatering::query();

        // Search by name or description
        if ($request->filled('q')) {
            $search = $request->q;
            $query->where(function ($q) use ($search) {
                $q->where('nama_menu', 'like', "%{$search}%")
                  ->orWhere('deskripsi', 'like', "%{$search}%");
            });
        }

        // Filter by category
        if ($request->filled('kategori') && $request->kategori !== 'all') {
            $query->where('kategori', $request->kategori);
        }

        // Filter by status
        if ($request->filled('status') && $request->status !== 'all') {
            $query->where('status', $request->status);
        }

        $menus = $query->latest()->paginate(10)->withQueryString();

        // Summary statistics
        $stats = [
            'total' => MenuCatering::count(),
            'tersedia' => MenuCatering::where('status', 'Tersedia')->count(),
            'habis' => MenuCatering::where('status', 'Habis')->count(),
            'kategori_count' => MenuCatering::distinct('kategori')->count('kategori'),
            'total_pesanan' => Pesanan::count(),
        ];

        $categories = [
            'Paket Prasmanan',
            'Main Course',
            'Starter',
            'Dessert',
            'Beverage',
            'Snack Box',
        ];

        return view('admin.menu.index', compact('menus', 'stats', 'categories'));
    }

    /**
     * Show the form for creating a new catering menu.
     */
    public function create()
    {
        $categories = [
            'Paket Prasmanan',
            'Main Course',
            'Starter',
            'Dessert',
            'Beverage',
            'Snack Box',
        ];

        return view('admin.menu.create', compact('categories'));
    }

    /**
     * Store a newly created catering menu in database.
     */
    public function store(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'nama_menu' => 'required|string|max:255',
            'kategori' => 'required|string|max:100',
            'harga' => 'required|numeric|min:0',
            'minimal_porsi' => 'required|integer|min:1',
            'status' => 'required|in:Tersedia,Habis',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ], [
            'nama_menu.required' => 'Nama menu wajib diisi.',
            'kategori.required' => 'Kategori menu wajib dipilih.',
            'harga.required' => 'Harga menu wajib diisi.',
            'harga.numeric' => 'Harga harus berupa angka.',
            'minimal_porsi.required' => 'Minimal porsi wajib diisi.',
            'foto.image' => 'File harus berupa gambar (jpeg, png, jpg, webp).',
            'foto.max' => 'Ukuran gambar maksimal 2MB.',
        ])->validate();

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path('uploads/menus');
            
            if (!File::isDirectory($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true, true);
            }

            $file->move($destinationPath, $filename);
            $validated['foto'] = $filename;
        }

        MenuCatering::create($validated);

        return redirect()->route('admin.menu.index')
            ->with('success', 'Menu catering baru berhasil ditambahkan!');
    }

    /**
     * Display the specified catering menu.
     */
    public function show(string $id)
    {
        $menu = MenuCatering::findOrFail($id);
        return redirect()->route('admin.menu.edit', $menu->id);
    }

    /**
     * Show the form for editing the specified catering menu.
     */
    public function edit(string $id)
    {
        $menu = MenuCatering::findOrFail($id);
        $categories = [
            'Paket Prasmanan',
            'Main Course',
            'Starter',
            'Dessert',
            'Beverage',
            'Snack Box',
        ];

        return view('admin.menu.edit', compact('menu', 'categories'));
    }

    /**
     * Update the specified catering menu in database.
     */
    public function update(Request $request, string $id)
    {
        $menu = MenuCatering::findOrFail($id);

        $validated = Validator::make($request->all(), [
            'nama_menu' => 'required|string|max:255',
            'kategori' => 'required|string|max:100',
            'harga' => 'required|numeric|min:0',
            'minimal_porsi' => 'required|integer|min:1',
            'status' => 'required|in:Tersedia,Habis',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ], [
            'nama_menu.required' => 'Nama menu wajib diisi.',
            'kategori.required' => 'Kategori menu wajib dipilih.',
            'harga.required' => 'Harga menu wajib diisi.',
            'harga.numeric' => 'Harga harus berupa angka.',
            'minimal_porsi.required' => 'Minimal porsi wajib diisi.',
            'foto.image' => 'File harus berupa gambar (jpeg, png, jpg, webp).',
            'foto.max' => 'Ukuran gambar maksimal 2MB.',
        ])->validate();

        if ($request->hasFile('foto')) {
            if ($menu->foto && File::exists(public_path('uploads/menus/' . $menu->foto))) {
                File::delete(public_path('uploads/menus/' . $menu->foto));
            }

            $file = $request->file('foto');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path('uploads/menus');

            if (!File::isDirectory($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true, true);
            }

            $file->move($destinationPath, $filename);
            $validated['foto'] = $filename;
        }

        $menu->update($validated);

        return redirect()->route('admin.menu.index')
            ->with('success', 'Data menu catering berhasil diperbarui!');
    }

    /**
     * Remove the specified catering menu from database.
     */
    public function destroy(string $id)
    {
        $menu = MenuCatering::findOrFail($id);

        if ($menu->foto && File::exists(public_path('uploads/menus/' . $menu->foto))) {
            File::delete(public_path('uploads/menus/' . $menu->foto));
        }

        $menu->delete();

        return redirect()->route('admin.menu.index')
            ->with('success', 'Menu catering berhasil dihapus!');
    }

    /**
     * Display catering menu catalog for Guest/Public users.
     */
    public function guestIndex(Request $request)
    {
        $query = MenuCatering::query();

        if ($request->filled('q')) {
            $search = $request->q;
            $query->where(function ($q) use ($search) {
                $q->where('nama_menu', 'like', "%{$search}%")
                  ->orWhere('deskripsi', 'like', "%{$search}%");
            });
        }

        if ($request->filled('kategori') && $request->kategori !== 'all') {
            $query->where('kategori', $request->kategori);
        }

        $menus = $query->orderBy('kategori')->orderBy('nama_menu')->get();

        $categories = [
            'Semua' => 'all',
            'Paket Prasmanan' => 'Paket Prasmanan',
            'Main Course' => 'Main Course',
            'Starter' => 'Starter',
            'Dessert' => 'Dessert',
            'Beverage' => 'Beverage',
            'Snack Box' => 'Snack Box',
        ];

        $selectedCategory = $request->get('kategori', 'all');
        $search = $request->get('q', '');
        $pakets = \App\Models\PaketCatering::where('status', '!=', 'Nonaktif')->take(4)->get();

        return view('guest.menu', compact('menus', 'categories', 'selectedCategory', 'search', 'pakets'));
    }

    /**
     * Handle order submission directly on the website (internal order).
     */
    public function submitOrder(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'menu_id' => 'nullable|exists:menu_caterings,id',
            'nama_menu' => 'required|string|max:255',
            'nama_pemesan' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'no_hp' => 'required|string|max:20',
            'alamat' => 'nullable|string',
            'jumlah_porsi' => 'required|integer|min:1',
            'tanggal_acara' => 'nullable|date',
            'jenis_acara' => 'nullable|string|max:100',
            'catatan' => 'nullable|string',
        ], [
            'nama_pemesan.required' => 'Nama lengkap wajib diisi.',
            'no_hp.required' => 'Nomor HP/WhatsApp aktif wajib diisi.',
            'jumlah_porsi.required' => 'Jumlah porsi wajib ditentukan.',
            'jumlah_porsi.min' => 'Jumlah pemesanan minimal 1 porsi.',
        ])->validate();

        // Calculate total
        $unitPrice = 0;
        if (!empty($validated['menu_id'])) {
            $menu = MenuCatering::find($validated['menu_id']);
            if ($menu) {
                $unitPrice = $menu->harga;
            }
        }

        $validated['total_harga'] = $unitPrice * $validated['jumlah_porsi'];
        $validated['kode_pesanan'] = 'NALA-' . date('Ymd') . '-' . strtoupper(substr(uniqid(), -4));
        $validated['status'] = 'Pending';

        $pesanan = Pesanan::create($validated);

        // Auto-register to pelanggan table if email/name provided
        if (!empty($validated['email'])) {
            $names = explode(' ', trim($validated['nama_pemesan']), 2);
            Pelanggan::updateOrCreate(
                ['email' => $validated['email']],
                [
                    'first_name' => $names[0],
                    'last_name' => $names[1] ?? '-',
                    'phone' => $validated['no_hp'],
                ]
            );
        }

        return redirect()->back()
            ->with('order_success', true)
            ->with('pesanan', $pesanan->toArray());
    }

    /**
     * Admin view for incoming orders.
     */
    public function adminOrders()
    {
        $orders = Pesanan::latest()->paginate(15);
        return view('admin.pesanan.index', compact('orders'));
    }

    /**
     * Admin update status of an order.
     */
    public function updateOrderStatus(Request $request, string $id)
    {
        $pesanan = Pesanan::findOrFail($id);
        $pesanan->update([
            'status' => $request->get('status', 'Dikonfirmasi')
        ]);

        return redirect()->back()->with('success', 'Status pesanan #' . $pesanan->kode_pesanan . ' berhasil diubah!');
    }
}
