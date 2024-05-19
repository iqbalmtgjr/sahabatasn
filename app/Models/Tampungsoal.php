<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tampungsoal extends Model
{
    use HasFactory;

    protected $table = 'tampung_soal';
    protected $guarded = ['id'];

    public function subpaket()
    {
        return $this->belongsTo(Subpaket::class, 'subpaket_id');
    }

    public function banksoal()
    {
        return $this->belongsTo(Banksoal::class);
    }
}
