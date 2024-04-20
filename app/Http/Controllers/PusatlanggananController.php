<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use Illuminate\Http\Request;

class PusatlanggananController extends Controller
{
    public function index()
    {
        return view('pusatlangganan.index');
    }

    public function detail()
    {
        return view('pusatlangganan.detailcpns');
    }

    public function detailskd()
    {
        $data = Paket::where('kategori_id', 1)->get();
        return view('pusatlangganan.detailskd', compact('data'));
    }

    public function detailskb()
    {
        $data = Paket::where('kategori_id', 2)->get();
        return view('pusatlangganan.detailskb', compact('data'));
    }

    public function detailpppk()
    {
        return view('pusatlangganan.detailpppk');
    }

    public function detailpppkteknis()
    {
        return view('pusatlangganan.detailpppkteknis');
    }

    public function detailpppkumum()
    {
        return view('pusatlangganan.detailpppkumum');
    }
}
