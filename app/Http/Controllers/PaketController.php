<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Paket;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;


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
            ->addColumn('gambar', function ($row) {
                if ($row->gambar == null) {
                    return '<p class="text-danger">Belum Ada Avatar</p>';
                } else {
                    if (file_exists('gambar/' . $row->gambar)) {
                        return '<img class="card-img-top" style="height: 120px; width: 120px; object-fit: cover; object-position: center;" src="gambar/' . $row->gambar . '" alt="avatar">';
                    } else {
                        return '<img class="card-img-top" style="height: 120px; width: 120px; object-fit: cover; object-position: center;" src="' . $row->gambar . '" alt="avatar">';
                    }
                }
            })
            ->rawColumns(['gambar'])    
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
        // dd($request->all());
        
        if ($request->file('gambar')) {
            $extension = $request->gambar->extension();
            $nama_file = round(microtime(true) * 1000) . '.' . $extension;

            $request->file('gambar')->move(public_path('gambar/'), $nama_file);

            $tambah = Paket::updateOrCreate([
                'gambar' => $nama_file,
                'judul' => $request->judul,
                'harga' => $request->harga,
                'kategori_id' => $request->kategori_id,
            ]);
        } else {
            $tambah = Paket::updateOrCreate([
                'judul' => $request->judul,
                'harga' => $request->harga,
                'kategori_id' => $request->kategori_id,
            ]);
        }

        toastr()->success('Berhasil menambah data paket.', 'Sukses');
        return redirect()->back();
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
        

        $data = Paket::find($request->id);
        $data->update($request->all());

        toastr()->success('Berhasil edit kategori.', 'Sukses');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Paket::findOrFail($id)->delete();
        return redirect()->back();
    }

    public function getdata($id)
    {
        $data = Paket::find($id);
        return $data;
    }
}
