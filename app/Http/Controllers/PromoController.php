<?php

namespace App\Http\Controllers;

use App\Models\Promo;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class PromoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = Promo::all();
        if ($request->ajax()) {
            return DataTables::of($data)
                ->addColumn('gambar', function ($row) {
                    $url = asset('promosi/' . $row->gambar);
                    if ($row->gambar == null) {
                        return '<p class="text-danger">Belum Ada Gambar</p>';
                    } else {
                        return '<img class="card-img-top lozad" style="height: 120px; width: 180px; object-fit: cover; object-position: center;" src="' . $url . '" alt="promosi">';
                    }
                })
                ->rawColumns(['gambar'])
                ->make(true);
        }

        return view('promo.index');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'gambar' => 'required',
            'judul' => 'required',
        ]);

        if ($validator->fails()) {
            toastr()->error('Ada Kesalahan Saat Penginputan.', 'Gagal');
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $extension = $request->gambar->extension();
        $nama_file = round(microtime(true) * 1000) . '.' . $extension;

        // $request->file('gambar')->move(public_path('../../public_html/gambar/'), $nama_file);
        $request->file('gambar')->move(public_path('promosi/'), $nama_file);

        Promo::updateOrCreate([
            'judul' => $request->judul,
            'gambar' => $nama_file,
        ]);

        toastr()->success('Berhasil menambah promosi.', 'Sukses');
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required',
        ]);

        if ($validator->fails()) {
            toastr()->error('Ada Kesalahan Saat Penginputan.', 'Gagal');
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = Promo::find($request->id);

        if ($request->file('gambar')) {
            // Hapus Foto Lama
            // $path = public_path('../../public_html/promosi/' . $data->gambar);
            $path = public_path('promosi/' . $data->gambar);
            if (file_exists($path)) {
                @unlink($path);
            }

            $extension = $request->gambar->extension();
            $nama_file = round(microtime(true) * 1000) . '.' . $extension;

            // $request->file('gambar')->move(public_path('../../public_html/promosi/'), $nama_file);
            $request->file('gambar')->move(public_path('promosi/'), $nama_file);

            $data->update([
                'judul' => $request->judul,
                'gambar' => $nama_file,
            ]);
        } else {
            $data->update([
                'judul' => $request->judul,
            ]);
        }

        toastr()->success('Berhasil edit promosi.', 'Sukses');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Promo::findOrFail($id)->delete();

        toastr()->success('Berhasil hapus promosi.', 'Sukses');
        return redirect()->back();
    }

    public function getdata($id)
    {
        $data = Promo::find($id);
        return $data;
    }
}
