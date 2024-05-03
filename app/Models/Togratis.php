<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Togratis extends Model
{
    use HasFactory;

    protected $table = 'togratis';
    protected $guarded = ['id'];

    public function jawaban()
    {
        return $this->hasOne(Jawabangratis::class, 'togratis_id');
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function subkategori()
    {
        return $this->belongsTo(Subkategori::class);
    }
}
