<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\PaketCatering;

class MenuGuestController extends Controller
{
    public function index(Request $request)
    {
        $selectedCategory = $request->input('kategori', 'all');

        // Query Builder untuk Menu Catering (CRUD 2)
        $query = DB::table('menu_caterings')
            ->where('status', 'Tersedia');

        // Filter Search
        if ($request->filled('q')) {
            $search = $request->q;
            $query->where(function ($q) use ($search) {
                $q->where('nama_menu', 'like', "%{$search}%")
                  ->orWhere('deskripsi', 'like', "%{$search}%");
            });
        }

        $menus = $query->orderBy('nama_menu', 'asc')->get()->map(function ($menu) {
    if ($menu->foto) {
        // 1. Cek apakah file foto ada di folder uploads/menu/ (hasil upload Admin)
        if (file_exists(public_path('uploads/menu/' . $menu->foto))) {
            $menu->foto_url = asset('uploads/menu/' . $menu->foto);
        } 
        // 2. Jika tidak ada, cek apakah file foto ada di folder assets-guest/img/ (foto bawaan template)
        elseif (file_exists(public_path('assets-guest/img/' . $menu->foto))) {
            $menu->foto_url = asset('assets-guest/img/' . $menu->foto);
        } 
        // 3. Jika tidak ada di kedua tempat tersebut, tampilkan hero.png
        else {
            $menu->foto_url = asset('assets-guest/img/hero.png');
        }
    } else {
        // Jika kolom foto di database NULL
        $menu->foto_url = asset('assets-guest/img/hero.png');
    }
        
    $menu->formatted_harga = 'Rp ' . number_format($menu->harga, 0, ',', '.');
    return $menu;
});

        // Opsi Kategori untuk Filter Button
        $categories = [
            'Semua Menu'      => 'all',
            'Paket Prasmanan' => 'Paket Prasmanan',
            'Main Course'     => 'Main Course',
            'Starter'         => 'Starter',
            'Dessert'         => 'Dessert',
            'Beverage'        => 'Beverage',
            'Snack Box'       => 'Snack Box',
        ];

        // Ambil data Paket Catering (Eloquent ORM - CRUD 1)
        $pakets = PaketCatering::where('status', 'Tersedia')->get();

        return view('guest.menu', compact('menus', 'categories', 'selectedCategory', 'pakets'));
    }
}