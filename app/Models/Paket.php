<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    use HasFactory;
    protected $table = 'paket';
    protected $guarded = ['id'];
    protected $fillable = ['subkategori_id', 'judul', 'gambar', 'harga'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
