<?php

namespace App\Http\Controllers;

use App\Models\Banksoal;
use App\Models\Paketsaya;
use Illuminate\Http\Request;
use App\Models\Simpanjawaban;
use App\Models\Tampungpaket;
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

        // dd($data);

        return view('paket_saya.index', compact('data'));
    }

    public function subpaket($paket_id)
    {
        $data = Tampungpaket::where('paket_id', $paket_id)->get();

        return view('paket_saya.subpaket.index', compact('data'));
    }

    // public function kerjakan($subpaket_id)
    // {
    //     $dataa = Banksoal::where('subkategori_id', $id)->get();

    //     $datas = Banksoal::where('subkategori_id', $id)->get();
    //     $nomor = (int)$no;
    //     $jmlh = $nomor - 1;
    //     $datas = $datas[$jmlh];
    //     return view('paket_saya.kerjakan', compact('datas', 'dataa', 'nomor'));
    // }

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
