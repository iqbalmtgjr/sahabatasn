<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use Illuminate\Http\Request;

class PusatlanggananController extends Controller
{
    public function index()
    {
        $data = Paket::all();
        return view('pusatlangganan.index', compact('data'));
    }
}
