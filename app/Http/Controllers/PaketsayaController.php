<?php

namespace App\Http\Controllers;

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
        if ($request->ajax()) {
            return DataTables::of($data)
                ->addColumn('nama_paket', function ($row) {
                    return $row->paket->judul;
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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
