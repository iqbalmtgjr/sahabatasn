<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subpaket extends Model
{
    use HasFactory;
    protected $table = 'sub_paket';
    protected $guarded = ['id'];
    protected $fillable = ['kategori_id', 'subkategori_id', 'judul', 'gambar', 'waktu'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function subkategori()
    {
        return $this->belongsTo(Subkategori::class);
    }

    public function tampungsoal()
    {
        return $this->hasMany(Tampungsoal::class);
    }
}
