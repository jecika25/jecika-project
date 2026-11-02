<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class MenuCateringController extends Controller
{
    protected $kategoriOptions = [
        'Paket Prasmanan',
        'Main Course',
        'Starter',
        'Dessert',
        'Beverage',
        'Snack Box'
    ];

    public function index(Request $request)
{
    $query = DB::table('menu_caterings');

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

    if ($request->filled('status') && $request->status !== 'all') {
        $query->where('status', $request->status);
    }

    // Ambil data dengan pagination
    $menus = $query->orderBy('id', 'desc')->paginate(8)->withQueryString();
    
    // Mapping foto_url DAN formatted_harga untuk View Admin
    $menus->through(function ($menu) {
        if ($menu->foto && file_exists(public_path('uploads/menu/' . $menu->foto))) {
            $menu->foto_url = asset('uploads/menu/' . $menu->foto);
        } elseif ($menu->foto && file_exists(public_path('assets-guest/img/' . $menu->foto))) {
            $menu->foto_url = asset('assets-guest/img/' . $menu->foto);
        } else {
            $menu->foto_url = asset('assets-guest/img/hero.png');
        }

        // Format harga rupiah
        $menu->formatted_harga = 'Rp ' . number_format($menu->harga, 0, ',', '.');

        return $menu;
    });

    $stats = [
        'total'          => DB::table('menu_caterings')->count(),
        'tersedia'       => DB::table('menu_caterings')->where('status', 'Tersedia')->count(),
        'habis'          => DB::table('menu_caterings')->where('status', 'Habis')->count(),
        'kategori_count' => DB::table('menu_caterings')->distinct('kategori')->count('kategori'),
        'main_course'    => DB::table('menu_caterings')->where('kategori', 'Main Course')->count(),
        'paket'          => DB::table('menu_caterings')->where('kategori', 'Paket Prasmanan')->count(),
    ];

    $categories = $this->kategoriOptions;
    $kategoriOptions = $this->kategoriOptions;

    return view('admin.menu.index', compact('menus', 'stats', 'categories', 'kategoriOptions'));
}

    public function store(Request $request)
    {
        $request->validate([
            'nama_menu'     => 'required|string|max:255',
            'kategori'      => 'required|string',
            'harga'         => 'required|numeric|min:0',
            'minimal_porsi' => 'required|integer|min:1',
            'deskripsi'     => 'nullable|string',
            'status'        => 'required|in:Tersedia,Habis',
            'foto'          => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $fotoName = null;
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $fotoName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/menu'), $fotoName);
        }

        DB::table('menu_caterings')->insert([
            'nama_menu'     => $request->nama_menu,
            'kategori'      => $request->kategori,
            'harga'         => $request->harga,
            'minimal_porsi' => $request->minimal_porsi,
            'deskripsi'     => $request->deskripsi,
            'status'        => $request->status,
            'foto'          => $fotoName,
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);

        return redirect()->route('admin.menu.index')->with('success', 'Menu catering berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_menu'     => 'required|string|max:255',
            'kategori'      => 'required|string',
            'harga'         => 'required|numeric|min:0',
            'minimal_porsi' => 'required|integer|min:1',
            'status'        => 'required|in:Tersedia,Habis',
            'foto'          => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $menu = DB::table('menu_caterings')->where('id', $id)->first();

        if (!$menu) {
            return redirect()->route('admin.menu.index')->with('error', 'Menu tidak ditemukan!');
        }

        $fotoName = $menu->foto;
        if ($request->hasFile('foto')) {
            if ($menu->foto && File::exists(public_path('uploads/menu/' . $menu->foto))) {
                File::delete(public_path('uploads/menu/' . $menu->foto));
            }

            $file = $request->file('foto');
            $fotoName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/menu'), $fotoName);
        }

        DB::table('menu_caterings')->where('id', $id)->update([
            'nama_menu'     => $request->nama_menu,
            'kategori'      => $request->kategori,
            'harga'         => $request->harga,
            'minimal_porsi' => $request->minimal_porsi,
            'deskripsi'     => $request->deskripsi,
            'status'        => $request->status,
            'foto'          => $fotoName,
            'updated_at'    => now(),
        ]);

        return redirect()->route('admin.menu.index')->with('success', 'Menu catering berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $menu = DB::table('menu_caterings')->where('id', $id)->first();

        if ($menu) {
            if ($menu->foto && File::exists(public_path('uploads/menu/' . $menu->foto))) {
                File::delete(public_path('uploads/menu/' . $menu->foto));
            }

            DB::table('menu_caterings')->where('id', $id)->delete();
        }

        return redirect()->route('admin.menu.index')->with('success', 'Menu catering berhasil dihapus!');
    }
}