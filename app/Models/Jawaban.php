<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    use HasFactory;

    protected $table = 'jawaban';
    protected $guarded = ['id'];

    public function banksoal()
    {
        return $this->belongsTo(Banksoal::class);
    }

    public function simpanjawaban()
    {
        return $this->hasOne(Simpanjawaban::class);
    }
}
