<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banksoal extends Model
{
    use HasFactory;

    protected $table = 'bank_soal';
    protected $guarded = ['id'];

    public function jawaban()
    {
        return $this->hasOne(Jawaban::class);
    }

    public function kategori()
    {
        return $this->hasOne(Kategori::class, 'id');
    }
}