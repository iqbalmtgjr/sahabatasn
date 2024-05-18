<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hasil extends Model
{
    use HasFactory;

    protected $table = 'hasil';
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function paketsaya()
    {
        return $this->belongsTo(Paketsaya::class);
    }

    public function simpanjawaban()
    {
        return $this->belongsTo(Simpanjawaban::class);
    }
}
