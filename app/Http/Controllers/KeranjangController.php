<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use App\Models\Keranjang;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class KeranjangController extends Controller
{
    public function index(Request $request, $id)
    {
        $paket = Paket::find($id);
        if ($paket) {
            Keranjang::updateOrCreate([
                'user_id' => auth()->user()->id,
                'paket_id' => $paket->id,
            ]);
        }

        $data = Keranjang::where('user_id', auth()->user()->id)->get();
        // if ($request->ajax()) {
        //     return DataTables::of($data)
        //         ->addColumn('nama_paket', function ($row) {
        //             return $row->paket->judul;
        //         })
        //         ->addColumn('harga', function ($row) {
        //             return 'Rp. ' . number_format($row->paket->harga, 0, ',', '.');
        //         })
        //         ->rawColumns(['status'])
        //         ->make(true);
        // }

        return view('keranjang.index', compact('paket', 'data'));
    }

    public function destroy(string $id)
    {
        Keranjang::findOrFail($id)->delete();
        return redirect()->back();
    }

    public function getdata($id)
    {
        $data = Keranjang::find($id);
        $data->paket;
        return $data;
    }
}
