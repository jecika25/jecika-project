<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuCatering extends Model
{
    use HasFactory;

    protected $table = 'menu_caterings';

    protected $fillable = [
        'nama_menu',
        'kategori',
        'harga',
        'deskripsi',
        'foto',
        'status',
        'minimal_porsi',
    ];

    /**
     * Format harga ke Rupiah
     */
    public function getFormattedHargaAttribute(): string
    {
        return 'Rp ' . number_format($this->harga, 0, ',', '.');
    }

    /**
     * Get Foto URL with sensible fallbacks
     */
    public function getFotoUrlAttribute(): string
    {
        if ($this->foto) {
            if (filter_var($this->foto, FILTER_VALIDATE_URL)) {
                return $this->foto;
            }
            if (file_exists(public_path('uploads/menus/' . $this->foto))) {
                return asset('uploads/menus/' . $this->foto);
            }
            if (file_exists(public_path('assets-guest/images/' . $this->foto))) {
                return asset('assets-guest/images/' . $this->foto);
            }
            if (file_exists(public_path($this->foto))) {
                return asset($this->foto);
            }
        }
        return asset('assets-guest/images/res_img_5.jpg');
    }
}
