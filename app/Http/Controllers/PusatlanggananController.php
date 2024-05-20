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
        $data = Paket::join('kategori', 'paket.kategori_id', '=', 'kategori.id')
            ->where('kategori_id', 1)
            ->where('harga', '>', 0)
            ->get();
        return view('pusatlangganan.detailskd', compact('data'));
    }

    public function detailskb()
    {
        $data = Paket::where('kategori_id', 2)
            ->where('harga', '>', 0)
            ->get();
        return view('pusatlangganan.detailskb', compact('data'));
    }

    public function detailpppk()
    {
        return view('pusatlangganan.detailpppk');
    }

    public function detailpppkteknis()
    {
        $data = Paket::where('kategori_id', 3)
            ->where('harga', '>', 0)
            ->get();
        return view('pusatlangganan.detailpppkteknis', compact('data'));
    }

    public function detailpppkumum()
    {
        $data = Paket::where('kategori_id', 4)->get();
        return view('pusatlangganan.detailpppkumum', compact('data'));
    }
}
