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

    public function detail()
    {
        return view('pusatlangganan.detailcpns');
    }

    public function detailskd()
    {
        return view('pusatlangganan.detailskd');
    }

    public function detailskb()
    {
        return view('pusatlangganan.detailskb');
    }
}
