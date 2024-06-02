<?php

namespace App\Http\Controllers;

use DOMDocument;
use App\Models\Kategori;
use App\Models\Togratis;
use App\Models\Subkategori;
use Illuminate\Http\Request;
use App\Models\Jawabangratis;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class TogratisController extends Controller
{
    public function index(Request $request)
    {
        $kategori = Kategori::all();
        $sub_kategori = Subkategori::all();
        $data = Togratis::all();
        if ($request->ajax()) {
            return DataTables::of($data)
                ->addColumn('kategori', function ($row) {
                    if ($row->subkategori->kategori) {
                        return $row->subkategori->kategori->kategori;
                    } else {
                        return '';
                    }
                })
                ->addColumn('sub_kategori', function ($row) {
                    if ($row->subkategori) {
                        return $row->subkategori->sub_kategori;
                    } else {
                        return '';
                    }
                })
                ->make(true);
        }

        return view('tryout_gratis.index', compact('kategori', 'sub_kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'soal' => 'required',
            'sub_kategori' => 'required',
            'pilihan_a' => 'required',
            'pilihan_b' => 'required',
            'pilihan_c' => 'required',
            'pilihan_d' => 'required',
            'jawaban_a' => 'required',
            'jawaban_b' => 'required',
            'jawaban_c' => 'required',
            'jawaban_d' => 'required',
        ]);

        if ($validator->fails()) {
            toastr()->error('Ada Kesalahan Saat Penginputan.', 'Gagal');
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $sub_find = Subkategori::find($request->sub_kategori)->kategori_id;
        if ($request->file('gambar')) {
            $extension = $request->gambar->extension();
            $nama_file = round(microtime(true) * 1000) . '.' . $extension;

            $request->file('gambar')->move(public_path('../../public_html/gambar_soal/'), $nama_file);

            $soal = Togratis::create([
                'kategori_id' => $sub_find,
                'subkategori_id' => $request->sub_kategori,
                'soal' => $request->soal,
                'gambar' => $nama_file,
            ]);
        } else {
            $soal = Togratis::create([
                'kategori_id' => $sub_find,
                'subkategori_id' => $request->sub_kategori,
                'soal' => $request->soal,
            ]);
        }

        Jawabangratis::create([
            'togratis_id' => $soal->id,
            'pilihan_a' => $request->pilihan_a,
            'pilihan_b' => $request->pilihan_b,
            'pilihan_c' => $request->pilihan_c,
            'pilihan_d' => $request->pilihan_d,
            'pilihan_e' => $request->pilihan_e,
            'jawaban_a' => $request->jawaban_a,
            'jawaban_b' => $request->jawaban_b,
            'jawaban_c' => $request->jawaban_c,
            'jawaban_d' => $request->jawaban_d,
            'jawaban_e' => $request->jawaban_e,
        ]);

        toastr()->success('Berhasil menambah soal.', 'Sukses');
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'soal' => 'required',
            'sub_kategori' => 'required',
            'pilihan_a' => 'required',
            'pilihan_b' => 'required',
            'pilihan_c' => 'required',
            'pilihan_d' => 'required',
            'jawaban_a' => 'required',
            'jawaban_b' => 'required',
            'jawaban_c' => 'required',
            'jawaban_d' => 'required',
        ]);

        if ($validator->fails()) {
            toastr()->error('Ada Kesalahan Saat Penginputan.', 'Gagal');
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $sub_find = Subkategori::find($request->sub_kategori)->kategori_id;
        if ($request->file('gambar')) {
            $extension = $request->gambar->extension();
            $nama_file = round(microtime(true) * 1000) . '.' . $extension;

            $request->file('gambar')->move(public_path('../../public_html/gambar_soal/'), $nama_file);

            $soal = Togratis::find($request->id);
            $soal->update([
                'kategori_id' => $sub_find,
                'subkategori_id' => $request->sub_kategori,
                'soal' => $request->soal,
                'gambar' => $nama_file,
            ]);
        } else {
            $soal = Togratis::find($request->id);
            $soal->update([
                'kategori_id' => $sub_find,
                'subkategori_id' => $request->sub_kategori,
                'soal' => $request->soal,
            ]);
        }

        $jawaban = Jawabangratis::where('togratis_id', $request->id)->first();
        $jawaban->update([
            'pilihan_a' => $request->pilihan_a,
            'pilihan_b' => $request->pilihan_b,
            'pilihan_c' => $request->pilihan_c,
            'pilihan_d' => $request->pilihan_d,
            'pilihan_e' => $request->pilihan_e,
            'jawaban_a' => $request->jawaban_a,
            'jawaban_b' => $request->jawaban_b,
            'jawaban_c' => $request->jawaban_c,
            'jawaban_d' => $request->jawaban_d,
            'jawaban_e' => $request->jawaban_e,
        ]);

        toastr()->success('Berhasil edit soal.', 'Sukses');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Togratis::find($id)->delete();
        Jawabangratis::where('togratis_id', $id)->first()->delete();
        return redirect()->back();
    }

    public function edit($id)
    {
        $data = Togratis::find($id);
        $sub_kategori = Subkategori::all();
        return view('tryout_gratis.edit', compact('data', 'sub_kategori'));
    }

    public function getdata($id)
    {
        $data = Togratis::find($id);
        $data->subkategori;
        $data->jawabangratis;
        return $data;
    }
}
