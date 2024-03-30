<?php

namespace App\Http\Controllers;

use App\Models\Banksoal;
use App\Models\Paketsaya;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PaketsayaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = Paketsaya::where('user_id', auth()->user()->id)->get();
        // dd($this->jmlh_cpns_byr(1, 'Berbayar'));
        if ($request->ajax()) {
            return DataTables::of($data)
                ->addColumn('nama_paket', function ($row) {
                    return $row->paket->judul;
                })
                ->addColumn('kategori', function ($row) {
                    return $row->paket->kategori->kategori;
                })
                ->addColumn('tipe', function ($row) {
                    return $row->paket->kategori->banksoal->tipe;
                })
                ->addColumn('jmlh_soal', function ($row) {
                    return $this->jmlh_cpns_byr($row->paket->kategori_id, $row->paket->kategori->banksoal->tipe)->count();
                })
                ->addColumn('status', function ($row) {
                    if ($row->status === 0) {
                        return '<div class="badge badge-light-danger">Expired</div>';
                    } else {
                        return '<div class="badge badge-light-primary">Aktif</div>';
                    }
                })
                ->rawColumns(['status'])
                ->make(true);
        }

        return view('paket_saya.index');
    }

    private function jmlh_cpns_byr($kategori_id, $tipe)
    {
        return Banksoal::where('kategori_id', $kategori_id)->where('tipe', $tipe)->get();
    }


    /**
     * Show the form for creating a new resource.
     */
    public function kerjakan()
    {
        return view('paket_saya.kerjakan');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
