<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penerbit extends Model
{
    use HasFactory;

    protected $table = 'penerbit';

    protected $fillable = [
        'id',
        'nama',
        'alamat',
        'kota',
        'telepon'
    ];

    public $incrementing = false;
    public $timestamps = false;


    // relasi ke buku
    public function buku()
    {
        return $this->hasMany(Buku::class, 'penerbit_id', 'id');
    }
}
