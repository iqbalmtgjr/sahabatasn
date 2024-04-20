<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use App\Models\Subkategori;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;


class PaketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $subkategori = Subkategori::all();
        $paket = Paket::all();
        if ($request->ajax()) {
            return DataTables::of($paket)
                ->addColumn('kategori_id', function ($row) {
                    if ($row->kategori) {
                        return $row->kategori->kategori;
                    } else {
                        return '';
                    }
                })
                ->addColumn('subkategori_id', function ($row) {
                    if ($row->subkategori) {
                        return $row->subkategori->sub_kategori;
                    } else {
                        return '';
                    }
                })
                ->addColumn('harga', function ($row) {
                    return 'Rp. ' . number_format($row->harga, 0, ',', '.');
                })
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
                ->rawColumns(['harga', 'gambar'])
                ->make(true);
        }

        return view('paket.index', compact('paket', 'subkategori'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required',
            'harga' => 'required',
            'subkategori_id' => 'required',
            'gambar' => 'required',
        ]);

        if ($validator->fails()) {
            toastr()->error('Ada Kesalahan Saat Penginputan.', 'Gagal');
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $kategori_id = Subkategori::find($request->subkategori_id)->kategori_id;

        if ($request->file('gambar')) {
            $extension = $request->gambar->extension();
            $nama_file = round(microtime(true) * 1000) . '.' . $extension;

            $request->file('gambar')->move(public_path('gambar/'), $nama_file);

            Paket::updateOrCreate([
                'gambar' => $nama_file,
                'judul' => $request->judul,
                'harga' => $request->harga,
                'kategori_id' => $kategori_id,
                'subkategori_id' => $request->subkategori_id,
            ]);
        } else {
            Paket::updateOrCreate([
                'judul' => $request->judul,
                'harga' => $request->harga,
                'kategori_id' => $kategori_id,
                'subkategori_id' => $request->subkategori_id,
            ]);
        }

        toastr()->success('Berhasil menambah data paket.', 'Sukses');
        return redirect()->back();
    }

    public function update(Request $request)
    {
        $data = Paket::find($request->id);

        $kategori_id = Subkategori::find($request->subkategori_id)->kategori_id;
        if ($request->file('gambar')) {
            // Hapus Foto Lama
            $path = public_path('gambar/' . $data->gambar);
            if (file_exists($path)) {
                @unlink($path);
            }

            $extension = $request->gambar->extension();
            $nama_file = round(microtime(true) * 1000) . '.' . $extension;

            $request->file('gambar')->move(public_path('gambar/'), $nama_file);

            $data->update([
                'gambar' => $nama_file,
                'judul' => $request->judul,
                'harga' => $request->harga,
                'kategori_id' => $kategori_id,
                'subkategori_id' => $request->subkategori_id,
            ]);
        } else {
            $data->update([
                'judul' => $request->judul,
                'harga' => $request->harga,
                'kategori_id' => $kategori_id,
                'subkategori_id' => $request->subkategori_id,
            ]);
        }

        toastr()->success('Berhasil edit data paket.', 'Sukses');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $paket = Paket::findOrFail($id);

        $path = public_path('gambar/' . $paket->gambar);
        if (file_exists($path)) {
            @unlink($path);
        }

        $paket->delete();

        return redirect()->back();
    }

    public function getdata($id)
    {
        $data = Paket::find($id);
        return $data;
    }
}
