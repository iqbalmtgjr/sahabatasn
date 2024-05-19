<?php

namespace App\Http\Controllers;

use App\Models\Banksoal;
use App\Models\Paketsaya;
use Illuminate\Http\Request;
use App\Models\Simpanjawaban;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class PaketsayaController extends Controller
{
    public function index(Request $request)
    {
        // status == 3 -> "Tipe Gratis"
        $data = Paketsaya::where('user_id', auth()->user()->id)
            ->where('status', '!=', 3)
            ->get();

        if ($data->first() != null) {
            $jmlh_soal = $this->banksoal($data->first()->paket->kategori_id, $data->first()->paket->subkategori_id)->count();
            return view('paket_saya.index', compact('data', 'jmlh_soal'));
        }
        return view('paket_saya.index', compact('data'));
    }

    private function banksoal($kategori_id, $subkategori_id)
    {
        if ($kategori_id > 1) {
            return Banksoal::where('kategori_id', $kategori_id)
                ->where('subkategori_id', $subkategori_id)
                ->get();
        } else {
            return Banksoal::where('kategori_id', $kategori_id)
                ->get();
        }
    }

    public function kerjakan($id, $no)
    {
        $dataa = Banksoal::where('subkategori_id', $id)->get();

        $datas = Banksoal::where('subkategori_id', $id)->get();
        $nomor = (int)$no;
        $jmlh = $nomor - 1;
        $datas = $datas[$jmlh];
        // dd($datas->subkategori_id);
        return view('paket_saya.kerjakan', compact('datas', 'dataa', 'nomor'));
    }

    public function togratis()
    {
        $data = Paketsaya::where('status', 3)
            ->get();
        // dd($data);
        return view('paket_saya.togratis', compact('data'));
    }

    public function store(Request $request)
    {
        for ($i = 1; $i < $request->step_total + 1; $i++) {
            $jawaban = 'jawaban_' . $i;
            $validator = Validator::make($request->all(), [
                $jawaban => 'required',
                $jawaban => 'required',
                $jawaban => 'required',
            ]);

            if ($validator->fails()) {
                toastr()->error('Ada Pertanyaan Yang Belum Dijawab.', 'Gagal');
                return redirect()
                    ->back();
            }

            Simpanjawaban::create([
                'user_id' => auth()->user()->id,
                'banksoal_id' => $request->banksoal_id,
                'subkategori_id' => $request->subkategori_id,
                'jawaban_id' => $request->jawaban_id,
                'jawab' => $request->$jawaban,
            ]);
        }

        toastr()->success('Jawaban berhasil disimpan', 'Berhasil');
        return redirect()->back();
    }
}
