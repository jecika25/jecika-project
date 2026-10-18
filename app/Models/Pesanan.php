<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $table = 'pesanans';

    protected $fillable = [
        'kode_pesanan',
        'menu_id',
        'nama_menu',
        'nama_pemesan',
        'email',
        'no_hp',
        'alamat',
        'jumlah_porsi',
        'total_harga',
        'tanggal_acara',
        'jenis_acara',
        'catatan',
        'status',
    ];

    public function menu()
    {
        return $this->belongsTo(MenuCatering::class, 'menu_id');
    }

    public function getFormattedTotalAttribute(): string
    {
        return 'Rp ' . number_format($this->total_harga, 0, ',', '.');
    }
}
