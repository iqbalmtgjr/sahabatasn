<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jawabangratis extends Model
{
    use HasFactory;


    protected $table = 'jawaban_gratis';
    protected $guarded = ['id'];

    public function togratis()
    {
        return $this->belongsTo(Togratis::class);
    }

    public function simpanjawaban()
    {
        return $this->hasOne(Simpanjawaban::class, 'togratis_id');
    }

    public function simpanjawabansubmit()
    {
        return $this->hasOne(Simpanjawabansubmit::class);
    }
}
