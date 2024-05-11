<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Simpanjawabansubmit extends Model
{
    use HasFactory;

    protected $table = 'simpan_jawaban_submit';
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function banksoal()
    {
        return $this->belongsTo(Banksoal::class);
    }

    public function togratis()
    {
        return $this->belongsTo(Togratis::class);
    }

    public function jawaban()
    {
        return $this->belongsTo(Jawaban::class);
    }

    public function jawabangratis()
    {
        return $this->belongsTo(Jawabangratis::class);
    }

    public function paketsaya()
    {
        return $this->belongsTo(Paketsaya::class);
    }
}
