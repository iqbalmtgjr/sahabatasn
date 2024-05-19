<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tampungpaket extends Model
{
    use HasFactory;

    protected $table = 'tampung_paket';
    protected $guarded = ['id'];

    public function paket()
    {
        return $this->belongsTo(Paket::class);
    }

    public function subpaket()
    {
        return $this->belongsTo(Subpaket::class);
    }
}
