<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Simpanjawaban extends Model
{
    use HasFactory;

    protected $table = 'simpan_jawaban';
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function banksoal()
    {
        return $this->belongsTo(Banksoal::class);
    }

    public function jawaban()
    {
        return $this->belongsTo(Jawaban::class);
    }
}
