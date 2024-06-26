<?php

namespace App\Http\Controllers;

use App\Models\Jawaban;
use App\Models\Banksoal;
use App\Models\Kategori;
use App\Models\Subkategori;
use DOMDocument;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class BanksoalController extends Controller
{
    public function index(Request $request)
    {
        $kategori = Kategori::all();
        $sub_kategori = Subkategori::all();

        $data = Banksoal::all();
        // dd($data);
        if ($request->ajax()) {
            return DataTables::of($data)
                ->addColumn('soal', function ($row) {
                    return $row->soal;
                })
                ->addColumn('kategori', function ($row) {
                    return optional($row->subkategori->kategori)->kategori;
                })
                ->addColumn('sub_kategori', function ($row) {
                    return optional($row->subkategori)->sub_kategori;
                })
                ->rawColumns(['soal'])
                ->make(true);
        }

        return view('bank_soal.index', compact('kategori', 'sub_kategori'));
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
            // 'tipe' => 'required',
            'pilihan_a' => 'required',
            'pilihan_b' => 'required',
            'pilihan_c' => 'required',
            'pilihan_d' => 'required',
            'jawaban_a' => 'required',
            'jawaban_b' => 'required',
            'jawaban_c' => 'required',
            'jawaban_d' => 'required',
            'pembahasan' => 'required',
        ]);

        if ($validator->fails()) {
            toastr()->error('Ada Kesalahan Saat Penginputan.', 'Gagal');
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }
        $sub_find = Subkategori::find($request->sub_kategori)->kategori_id;

        $dom_soal = new DOMDocument();
        $dom_soal->loadHTML($request->soal, 255);
        $soall = $dom_soal->saveHTML();
        if ($request->file('gambar')) {
            $extension = $request->gambar->extension();
            $nama_file = round(microtime(true) * 1000) . '.' . $extension;

            $request->file('gambar')->move(public_path('gambar_soal/'), $nama_file);

            $soal = Banksoal::create([
                'kategori_id' => $sub_find,
                'subkategori_id' => $request->sub_kategori,
                'soal' => $soall,
                // 'tipe' => $request->tipe,
                'gambar' => $nama_file,
            ]);
        } else {
            $soal = Banksoal::create([
                'kategori_id' => $sub_find,
                'subkategori_id' => $request->sub_kategori,
                'soal' => $soall,
                // 'tipe' => $request->tipe,
            ]);
        }


        $dom = new DOMDocument();

        $dom->loadHTML($request->pembahasan, 255);

        $image = $dom->getElementsByTagName('img');

        foreach ($image as $key => $img) {
            $data = base64_decode(explode(',', explode(';', $img->getAttribute('src'))[1])[1]);
            $image_name = "/gambar/" . time() . $key . '.png';

            file_put_contents(public_path() . $image_name, $data);

            $img->removeAttribute('src');
            $img->setAttribute('src', $image_name);
        }

        $pembahas = $dom->saveHTML();

        Jawaban::create([
            'bank_soal_id' => $soal->id,
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
            'pembahasan' => $pembahas,
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
            // 'tipe' => 'required',
            'pilihan_a' => 'required',
            'pilihan_b' => 'required',
            'pilihan_c' => 'required',
            'pilihan_d' => 'required',
            'jawaban_a' => 'required',
            'jawaban_b' => 'required',
            'jawaban_c' => 'required',
            'jawaban_d' => 'required',
            'pembahasan' => 'required',
        ]);

        if ($validator->fails()) {
            toastr()->error('Ada Kesalahan Saat Penginputan.', 'Gagal');
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $sub_find = Subkategori::find($request->sub_kategori)->kategori_id;

        $dom_soal = new DOMDocument();
        $dom_soal->loadHTML($request->soal, 255);
        $soall = $dom_soal->saveHTML();
        if ($request->file('gambar')) {
            $extension = $request->gambar->extension();
            $nama_file = round(microtime(true) * 1000) . '.' . $extension;

            $request->file('gambar')->move(public_path('gambar_soal/'), $nama_file);

            $soal = Banksoal::find($request->id);
            $soal->update([
                'kategori_id' => $sub_find,
                'subkategori_id' => $request->sub_kategori,
                'soal' => $soall,
                // 'tipe' => $request->tipe,
                'gambar' => $nama_file,
            ]);
        } else {
            $soal = Banksoal::find($request->id);
            $soal->update([
                'kategori_id' => $sub_find,
                'subkategori_id' => $request->sub_kategori,
                'soal' => $soall,
                // 'tipe' => $request->tipe,
            ]);
        }

        $dom = new DOMDocument();
        $dom->loadHTML($request->pembahasan, 9);

        $image = $dom->getElementsByTagName('img');

        foreach ($image as $key => $img) {

            if (strpos($img->getAttribute('src'), 'data:image/') === 0) {
                $data = base64_decode(explode(',', explode(';', $img->getAttribute('src'))[1])[1]);
                $image_name = "/gambar/" . time() . $key . '.png';

                file_put_contents(public_path() . $image_name, $data);

                $img->removeAttribute('src');
                $img->setAttribute('src', $image_name);
            }
        }
        $pembahas = $dom->saveHTML();

        $jawaban = Jawaban::where('bank_soal_id', $request->id)->first();
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
            'pembahasan' => $pembahas,
        ]);

        toastr()->success('Berhasil edit soal.', 'Sukses');
        return redirect('bank-soal');
    }

    public function destroy(string $id)
    {
        $jawaban = Jawaban::where('bank_soal_id', $id)->first();
        $jawaban->delete();
        Banksoal::find($id)->delete();
        return redirect()->back();
    }

    public function edit($id)
    {
        $data = Banksoal::find($id);
        $sub_kategori = Subkategori::all();
        return view('bank_soal.edit', compact('data', 'sub_kategori'));
    }

    public function getdata($id)
    {
        $data = Banksoal::find($id);
        $data->subkategori;
        $data->jawaban;
        return $data;
    }
}
