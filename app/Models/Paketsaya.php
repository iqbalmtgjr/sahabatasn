<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paketsaya extends Model
{
    use HasFactory;

    protected $table = 'paket_saya';
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function paket()
    {
        return $this->belongsTo(Paket::class);
    }

    public function simpanjawaban()
    {
        return $this->hasOne(Simpanjawaban::class);
    }
}
