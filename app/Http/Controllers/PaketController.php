<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Paket;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PaketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $kategori = Kategori::all();
        $paket = Paket::all();
        if ($request->ajax()) {
            return DataTables::of($paket)
                ->make(true);
        }
                
        return view('paket.index', compact('paket','kategori'));
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
