<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategori';
    protected $guarded = ['id'];

    public function subkategori()
    {
        return $this->hasOne(Subkategori::class);
    }

    public function paket()
    {
        return $this->hasOne(Paket::class);
    }
}
