<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaketCatering extends Model
{
    use HasFactory;

    protected $table = 'paket_caterings';

    protected $fillable = [
        'nama_paket',
        'jenis_paket',
        'harga_paket',
        'minimal_porsi',
        'deskripsi',
        'fasilitas',
        'status',
        'foto',
    ];

    /**
     * Format harga paket ke format Rupiah
     */
    public function getFormattedHargaAttribute(): string
    {
        return 'Rp ' . number_format($this->harga_paket, 0, ',', '.');
    }

    /**
     * Fallback URL Foto Paket
     */
    public function getFotoUrlAttribute(): string
    {
        if ($this->foto) {
            if (filter_var($this->foto, FILTER_VALIDATE_URL)) {
                return $this->foto;
            }
            if (file_exists(public_path('uploads/paket/' . $this->foto))) {
                return asset('uploads/paket/' . $this->foto);
            }
            if (file_exists(public_path('assets-guest/images/' . $this->foto))) {
                return asset('assets-guest/images/' . $this->foto);
            }
            if (file_exists(public_path($this->foto))) {
                return asset($this->foto);
            }
        }
        return asset('assets-guest/images/res_img_6.jpg');
    }
}
