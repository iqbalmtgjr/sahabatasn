<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use App\Models\Paketsaya;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class PembayaranController extends Controller
{
    public function index(Request $request)
    {
        $data = Pembayaran::all();
        if ($request->ajax()) {
            return DataTables::of($data)
                ->addColumn('nama_paket', function ($row) {
                    return $row->paket->judul;
                })
                ->addColumn('atas_nama', function ($row) {
                    return $row->user->name;
                })
                ->addColumn('harga', function ($row) {
                    return 'Rp. ' . number_format($row->paket->harga, 0, ',', '.');
                })
                ->addColumn('harga_bayar', function ($row) {
                    return 'Rp. ' . number_format($row->nominal, 0, ',', '.');
                })
                ->addColumn('status', function ($row) {
                    if ($row->status === 0) {
                        return '<div class="badge badge-light-danger">Belum divalidasi</div>';
                    } else {
                        return '<div class="badge badge-light-primary">Sudah divalidasi</div>';
                    }
                })
                ->rawColumns(['status'])
                ->make(true);
        }

        return view('pembayaran.index');
    }

    public function invoice(Request $request)
    {
        $data = Pembayaran::where('user_id', auth()->user()->id)->get();
        if ($request->ajax()) {
            return DataTables::of($data)
                ->addColumn('nama_paket', function ($row) {
                    return $row->paket->judul;
                })
                ->addColumn('harga', function ($row) {
                    return 'Rp. ' . number_format($row->paket->harga, 0, ',', '.');
                })
                ->addColumn('harga_bayar', function ($row) {
                    return 'Rp. ' . number_format($row->nominal, 0, ',', '.');
                })
                ->addColumn('status', function ($row) {
                    if ($row->status === 0) {
                        return '<div class="badge badge-light-danger">Belum divalidasi</div>';
                    } else {
                        return '<div class="badge badge-light-primary">Sudah divalidasi</div>';
                    }
                })
                ->rawColumns(['status'])
                ->make(true);
        }

        return view('pembayaran.invoice');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'bukti_bayar' => 'required',
            'nominal' => 'required',
        ]);

        if ($validator->fails()) {
            toastr()->error('Ada Kesalahan Saat Penginputan.', 'Gagal');
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $pembayaran = Pembayaran::where('paket_id', $request->paket_id)->first();

        //hapus data keranjang
        Keranjang::where('user_id', auth()->user()->id)
            ->where('paket_id', $request->paket_id)
            ->first()->delete();

        if (!$pembayaran) {
            $extension = $request->bukti_bayar->extension();
            $nama_file = round(microtime(true) * 1000) . '.' . $extension;

            $request->file('bukti_bayar')->move(public_path('bukti/'), $nama_file);

            Pembayaran::updateOrCreate([
                'user_id' => auth()->user()->id,
                'paket_id' => $request->paket_id,
                'nominal' => $request->nominal,
                'status' => 0,
                'gambar' => $nama_file,
            ]);

            toastr()->success('Berhasil kirim bukti bayar.', 'Sukses');
            return redirect('invoice');
        } else {
            toastr()->warning('Bukti bayar ini sudah pernah terkirim.', 'Peringatan');
            return redirect('invoice');
        }
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nominal' => 'required',
        ]);

        if ($validator->fails()) {
            toastr()->error('Ada Kesalahan Saat Penginputan.', 'Gagal');
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $pembayaran = Pembayaran::find($request->id);

        if ($request->file('bukti_bayar')) {
            $path = public_path('bukti/' . $pembayaran->gambar);
            if (file_exists($path)) {
                @unlink($path);
            }

            $extension = $request->bukti_bayar->extension();
            $nama_file = round(microtime(true) * 1000) . '.' . $extension;

            $request->file('bukti_bayar')->move(public_path('bukti/'), $nama_file);

            $pembayaran->update([
                'nominal' => $request->nominal,
                'gambar' => $nama_file,
            ]);
        } else {
            $pembayaran->update([
                'nominal' => $request->nominal,
            ]);
        }

        toastr()->success('Berhasil ubah bukti bayar.', 'Sukses');
        return redirect()->back();
    }

    public function validasi(Request $request)
    {
        $pembayaran = Pembayaran::find($request->id);
        $pembayaran->update([
            'status' => $request->status,
        ]);

        if ($pembayaran->status == 1) {
            Paketsaya::updateOrCreate([
                'user_id' => $pembayaran->user_id,
                'paket_id' => $pembayaran->paket_id,
                'status' => 1,
            ]);
        }

        toastr()->success('Status berhasil diubah.', 'Sukses');
        return redirect()->back();
    }

    public function getdata($id)
    {
        $data = Pembayaran::find($id);
        $data->paket;
        return $data;
    }
}
