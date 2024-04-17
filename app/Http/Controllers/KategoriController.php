<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Subkategori;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // dd($request->id);
        $sub = $request->has('id') ? Subkategori::where('kategori_id', $request->id)->get() : collect();
        // return view('kategori.modalsub', compact('sub'));
        $data = Kategori::all();
        if ($request->ajax()) {
            return DataTables::of($data)
                ->make(true);
        }

        return view('kategori.index', compact('sub'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kategori' => 'required',
        ]);

        if ($validator->fails()) {
            toastr()->error('Ada Kesalahan Saat Penginputan.', 'Gagal');
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        Kategori::create($request->all());

        toastr()->success('Berhasil menambah kategori.', 'Sukses');
        return redirect()->back();
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kategori' => 'required',
        ]);

        if ($validator->fails()) {
            toastr()->error('Ada Kesalahan Saat Penginputan.', 'Gagal');
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = Kategori::find($request->id);
        $data->update($request->all());

        toastr()->success('Berhasil edit kategori.', 'Sukses');
        return redirect()->back();
    }

    public function sub(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'sub_kategori' => 'required',
        ]);

        if ($validator->fails()) {
            toastr()->error('Ada Kesalahan Saat Penginputan.', 'Gagal');
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        Subkategori::create([
            'kategori_id' => $request->id,
            'sub_kategori' => $request->sub_kategori,
        ]);
        // $data->update($request->all());

        // toastr()->success('Berhasil tambah sub kategori.', 'Sukses');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)

    {
        $kategori = Kategori::findOrFail($id);
        if ($kategori->paket()->count() > 0) {
            toastr()->error('Kategori tidak bisa dihapus karena memiliki paket terkait.', 'Gagal');
            return redirect()->back();
        }

        $kategori->delete();
        toastr()->success('Kategori berhasil dihapus.', 'Sukses');
        return redirect()->back();
    }

    public function getdata($id)
    {
        $data = Kategori::find($id);
        return $data;
    }

    public function getdatasub($id)
    {
        $sub = Subkategori::where('kategori_id', $id)->get();
        return response()->json(['sub_kategori' => $sub]);
    }

    public function destroySubKategori($id)
    {
        $subkategori = Subkategori::findOrFail($id);
        $subkategori->delete();

        return redirect()->back();
    }
}
