<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $table = 'buku'; // nama tabel di database

    protected $fillable = [
        'id',
        'kategori',
        'nama_buku',
        'harga',
        'stok',
        'penerbit_id'
    ];

    public $incrementing = false; // karena id bukan auto-increment (berisi huruf/angka)

    // relasi ke penerbit
    public function penerbit()
    {
        return $this->belongsTo(Penerbit::class, 'penerbit_id', 'id');
    }
}
