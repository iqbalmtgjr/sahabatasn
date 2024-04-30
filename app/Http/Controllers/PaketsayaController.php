<?php

namespace App\Http\Controllers;

use App\Models\Banksoal;
use App\Models\Paketsaya;
use Illuminate\Http\Request;
use App\Models\Simpanjawaban;
use Yajra\DataTables\Facades\DataTables;

class PaketsayaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = Paketsaya::where('user_id', auth()->user()->id)->get();
        return view('paket_saya.index', compact('data'));
    }

    private function banksoal($subkategori_id, $tipe)
    {
        return Banksoal::where('subkategori_id', $subkategori_id)->where('tipe', $tipe)->get();
    }

    /**
     * Show the form for creating a new resource.
     */
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
        return view('paket_saya.togratis');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        for ($i = 1; $i < $request->step_total + 1; $i++) {
            $jawaban = 'jawaban_' . $i;
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

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
