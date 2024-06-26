<?php

namespace App\Http\Controllers;

use App\Models\Hasil;
use App\Models\Paket;
use App\Models\Kategori;
use App\Models\Subpaket;
use App\Models\Paketsaya;
use App\Models\Pembayaran;
use App\Models\Subkategori;
use Illuminate\Support\Str;
use App\Models\Tampungpaket;
use App\Models\Tampungsoal;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;


class PaketController extends Controller
{
    public function index(Request $request)
    {
        $kategori = Kategori::all();
        $paket = Paket::all();
        if ($request->ajax()) {
            return DataTables::of($paket)
                ->addColumn('harga', function ($row) {
                    if ($row->harga == 0) {
                        return 'Gratis';
                    } else {
                        return 'Rp. ' . number_format($row->harga, 0, ',', '.');
                    }
                })
                ->addColumn('kategori', function ($row) {
                    return $row->kategori->kategori;
                })
                ->addColumn('subpaket', function ($row) {
                    $data = Tampungpaket::where('paket_id', $row->id)->get();
                    return count($data);
                })
                ->addColumn('gambar', function ($row) {
                    $url = asset('gambar/' . $row->gambar);
                    if ($row->gambar == null) {
                        return '<p class="text-danger">Belum Ada Gambar</p>';
                    } else {
                        if (file_exists('gambar/' . $row->gambar)) {
                            return '<img class="card-img-top" style="height: 120px; width: 120px; object-fit: cover; object-position: center;" src="' . $url . '" alt="gambar paket">';
                        } else {
                            return '<span class="text-danger">Kesalahan Saat Mengambil Gambar</span>';
                        }
                    }
                })
                ->rawColumns(['harga', 'gambar'])
                ->make(true);
        }

        return view('paket.index', compact('paket', 'kategori'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'gambar' => 'required',
            'judul' => 'required',
            'harga' => 'required',
            'kategori' => 'required',
        ]);

        if ($validator->fails()) {
            toastr()->error('Ada Kesalahan Saat Penginputan.', 'Gagal');
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }
        // $kategori_id = Subkategori::find($request->subkategori_id)->kategori_id;

        if ($request->file('gambar')) {
            $extension = $request->gambar->extension();
            $nama_file = round(microtime(true) * 1000) . '.' . $extension;

            $request->file('gambar')->move(public_path('../../public_html/gambar/'), $nama_file);

            $paket = Paket::updateOrCreate([
                'gambar' => $nama_file,
                'judul' => $request->judul,
                'harga' => $request->harga,
                'kategori_id' => $request->kategori,
            ]);
        } else {
            $paket = Paket::updateOrCreate([
                'judul' => $request->judul,
                'harga' => $request->harga,
                'kategori_id' => $request->kategori,
            ]);
        }

        // status == 3 || harga == 0 -> "Tipe Gratis"
        if ($request->harga == 0) {
            $paketsaya_gratis = Paketsaya::updateOrCreate([
                'user_id' => auth()->user()->id,
                'paket_id' => $paket->id,
                'status' => 3,
            ]);

            // if ($request->kategori == 1) {
            //     $subpaket_gratis = Subpaket::updateOrCreate([
            //         'kategori_id' => $request->kategori,
            //         'subkategori_id' => 1,
            //         'judul' => $request->judul,
            //         'waktu' => 110,
            //     ]);
            // } elseif ($request->kategori == 2) {
            //     $subpaket_gratis = Subpaket::updateOrCreate([
            //         'kategori_id' => $request->kategori,
            //         'subkategori_id' => 2,
            //         'judul' => $request->judul,
            //         'waktu' => 110,
            //     ]);
            // }
        }

        toastr()->success('Berhasil menambah data paket.', 'Sukses');
        return redirect()->back();
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required',
            'harga' => 'required',
            'kategori' => 'required',
        ]);

        if ($validator->fails()) {
            toastr()->error('Ada Kesalahan Saat Penginputan.', 'Gagal');
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = Paket::find($request->id);

        // $kategori_id = Subkategori::find($request->subkategori_id)->kategori_id;
        if ($request->file('gambar')) {
            // Hapus Foto Lama
            $path = public_path('../../public_html/gambar/' . $data->gambar);
            if (file_exists($path)) {
                @unlink($path);
            }

            $extension = $request->gambar->extension();
            $nama_file = round(microtime(true) * 1000) . '.' . $extension;

            $request->file('gambar')->move(public_path('../../public_html/gambar/'), $nama_file);

            $data->update([
                'gambar' => $nama_file,
                'judul' => $request->judul,
                'harga' => $request->harga,
                'kategori' => $request->kategori,
            ]);
        } else {
            $data->update([
                'judul' => $request->judul,
                'harga' => $request->harga,
                'kategori' => $request->kategori,
            ]);
        }

        toastr()->success('Berhasil edit data paket.', 'Sukses');
        return redirect()->back();
    }

    public function destroy(string $id)
    {
        //hapus_paket
        $paket = Paket::findOrFail($id);
        $path = public_path('../../public_html/gambar/' . $paket->gambar);
        if (file_exists($path)) {
            @unlink($path);
        }
        $paket->delete();

        // hapus_tampungpaket
        Tampungpaket::where('paket_id', $id)->delete();

        // hapus_invoice_pelanggan
        Pembayaran::where('paket_id', $id)->delete();

        // hapus_paket_dipelanggan (paket saya)
        $Paketsaya = Paketsaya::where('paket_id', $id)->first();

        if ($Paketsaya) {
            // hapus yg difitur hasil pelanggan karena paket saya dihapus juga
            $hasil = Hasil::where('paketsaya_id', $Paketsaya->id)->first();
            if ($hasil) {
                $hasil->delete();
            }
            $Paketsaya->delete();
        }



        toastr()->success('Berhasil hapus data paket.', 'Sukses');
        return redirect()->back();
    }

    public function sub(Request $request, $id)
    {
        $data = Tampungpaket::where('paket_id', $id)->get();
        $subpaket = Subpaket::all();
        if ($request->ajax()) {
            return DataTables::of($data)
                ->addColumn('subpaket', function ($row) {
                    return $row->subpaket->judul;
                })
                ->make(true);
        }
        return view('paket.sub', compact('data', 'subpaket', 'id'));
    }

    public function subpost(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'subpaket' => 'required',
        ]);

        if ($validator->fails()) {
            toastr()->error('Sub paket belum dipilih.', 'Gagal');
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $subpaket = Subpaket::whereIn('id', $request->subpaket)->get();
        $sub = array();
        foreach ($subpaket as $value) {
            $cek = Tampungpaket::where('paket_id', $request->id)
                ->where('subpaket_id', $value->id)->first();
            if (!$cek) {
                $sub[] = array(
                    'paket_id' => $request->id,
                    'subpaket_id' => $value->id,
                    'created_at' => now(),
                    'updated_at' => now()
                );
            }
        }

        if (count($sub) > 0) {
            Tampungpaket::insert($sub);
            toastr()->success('Sub paket berhasil ditambah.', 'Selamat');
        } else {
            toastr()->error('Sub paket sudah ada, tidak bisa ditambahkan lagi.', 'Gagal');
        }

        return redirect()->back();
    }

    public function subhapus($id)
    {
        Tampungpaket::find($id)->delete();

        toastr()->success('Sub paket berhasil dihapus.', 'Selamat');
        return redirect()->back();
    }

    public function getdata($id)
    {
        $data = Paket::find($id);
        return $data;
    }
}
