<?php

namespace App\Http\Controllers;

use App\Models\Banksoal;
use App\Models\Kategori;
use App\Models\Subpaket;
use App\Models\Paketsaya;
use App\Models\Subkategori;
use App\Models\Tampungsoal;
use App\Models\Togratis;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class SubpaketController extends Controller
{
    public function index(Request $request)
    {
        $subkategori = Subkategori::all();
        $paket = Subpaket::all();
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
                ->addColumn('banyak_soal', function ($row) {
                    if ($row->tampungsoal) {
                        return $row->tampungsoal->count();
                    } else {
                        return '';
                    }
                })
                ->rawColumns(['gambar'])
                ->make(true);
        }

        return view('subpaket.index', compact('paket', 'subkategori'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'judul' => 'required',
            'subkategori_id' => 'required',
            'waktu' => 'required',
        ]);

        if ($validator->fails()) {
            toastr()->error('Ada Kesalahan Saat Penginputan.', 'Gagal');
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $kategori_id = Subkategori::find($request->subkategori_id)->kategori_id;

        Subpaket::updateOrCreate([
            'judul' => $request->judul,
            'waktu' => $request->waktu,
            'kategori_id' => $kategori_id,
            'subkategori_id' => $request->subkategori_id,
        ]);

        // status == 3 -> "Tipe Gratis"
        // if ($request->harga == 0) {
        //     Paketsaya::updateOrCreate([
        //         'user_id' => auth()->user()->id,
        //         'paket_id' => $paket->id,
        //         'status' => 3,
        //     ]);
        // }

        toastr()->success('Berhasil menambah data paket.', 'Sukses');
        return redirect()->back();
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required',
            'subkategori_id' => 'required',
            'waktu' => 'required',
        ]);

        if ($validator->fails()) {
            toastr()->error('Ada Kesalahan Saat Penginputan.', 'Gagal');
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }
        // dd($request->all());
        $data = Subpaket::find($request->id);

        $kategori_id = Subkategori::find($request->subkategori_id)->kategori_id;
        $data->update([
            'judul' => $request->judul,
            'waktu' => $request->waktu,
            'kategori_id' => $kategori_id,
            'subkategori_id' => $request->subkategori_id,
        ]);

        toastr()->success('Berhasil edit data paket.', 'Sukses');
        return redirect()->back();
    }

    public function destroy(string $id)
    {
        $data = Subpaket::findOrFail($id);
        $data->delete();

        $soal = Tampungsoal::where('subpaket_id', $id)->get();
        foreach ($soal as $value) {
            $value->delete();
        }

        toastr()->success('Berhasil menghapus data paket.', 'Sukses');
        return redirect()->back();
    }

    public function createsoal(Request $request)
    {
        $banksoal = Banksoal::whereIn('id', $request->soal)->get();
        $soal = array();
        foreach ($banksoal as $value) {
            $cek = Tampungsoal::where('banksoal_id', $value->id)->where('subpaket_id', $request->subpaket_id)->first();
            if (!$cek) {
                $soal[] = array(
                    'subpaket_id' => $request->subpaket_id,
                    'banksoal_id' => $value->id,
                    'created_at' => now(),
                    'updated_at' => now()
                );
            }
        }

        if (count($soal) > 0) {
            Tampungsoal::insert($soal);
            toastr()->success('Soal berhasil ditambah.', 'Selamat');
        } else {
            toastr()->error('Soal sudah ada, tidak bisa ditambahkan lagi.', 'Gagal');
        }

        return redirect()->back();
    }

    public function soal(Request $request, $id)
    {
        $data = Tampungsoal::where('subpaket_id', $id)->get();
        $sub_kategori = Subkategori::all();

        $twk = Banksoal::where('subkategori_id', 1)->get();
        $tiu = Banksoal::where('subkategori_id', 2)->get();
        $tkp = Banksoal::where('subkategori_id', 3)->get();

        if ($request->ajax()) {
            return DataTables::of($data)
                ->addColumn('soal', function ($row) {
                    return $row->banksoal->soal;
                })
                ->addColumn('kategori', function ($row) {
                    return $row->banksoal->kategori->kategori;
                })
                ->addColumn('subkategori', function ($row) {
                    return $row->banksoal->subkategori->sub_kategori;
                })
                ->make(true);
        }

        return view('subpaket.soal', compact('twk', 'tiu', 'tkp', 'id', 'sub_kategori', 'data'));
    }

    public function hapus($id)
    {
        Tampungsoal::find($id)->delete();
        toastr()->success('Soal berhasil di hapus.', 'Selamat');
        return redirect()->back();
    }

    public function getdata($id)
    {
        $data = Subpaket::find($id);
        $data->tampungsoal;
        return $data;
    }
}
