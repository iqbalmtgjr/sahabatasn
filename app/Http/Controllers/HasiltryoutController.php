<?php

namespace App\Http\Controllers;

use App\Models\Banksoal;
use App\Models\Jawaban;
use App\Models\Paketsaya;
use Illuminate\Http\Request;
use App\Models\Simpanjawaban;
use Yajra\DataTables\Facades\DataTables;

class HasiltryoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = Paketsaya::where('user_id', auth()->user()->id)
            ->where('submit', 1)
            ->get();

        $soal_twk = Banksoal::where('subkategori_id', 1)->get();
        $soal_tiu = Banksoal::where('subkategori_id', 2)->get();
        $soal_tkp = Banksoal::where('subkategori_id', 3)->get();

        $tangkap_twk = array();
        foreach ($soal_twk as $item) {
            $simpan_jawaban_twk = Simpanjawaban::where('banksoal_id', $item->id)
                ->where('subkategori_id', 1)
                ->first()->jawab;
            $tangkap_twk[] = $simpan_jawaban_twk;

            $jawaban = Jawaban::where('bank_soal_id', $item->id)->get();
            $tangkap_jawaban = array();
            foreach ($jawaban as $key => $value) {
                $tangkap_jawaban[] = $value->pilihan_a;
                $tangkap_jawaban[] = $value->pilihan_b;
                $tangkap_jawaban[] = $value->pilihan_c;
                $tangkap_jawaban[] = $value->pilihan_d;
            }

            $hasil = array_intersect($tangkap_twk, $tangkap_jawaban);
            $frekuensi_a = Jawaban::where('pilihan_a', $hasil)->whereNotNull('jawaban_a')->value('jawaban_a');
            $frekuensi_b = Jawaban::where('pilihan_b', $hasil)->whereNotNull('jawaban_b')->value('jawaban_b');
            $frekuensi_c = Jawaban::where('pilihan_c', $hasil)->whereNotNull('jawaban_c')->value('jawaban_c');
            $frekuensi_d = Jawaban::where('pilihan_d', $hasil)->whereNotNull('jawaban_d')->value('jawaban_d');

            $frekuensi = array();
            $frekuensi[] = $frekuensi_a;
            $frekuensi[] = $frekuensi_b;
            $frekuensi[] = $frekuensi_c;
            $frekuensi[] = $frekuensi_d;
            $jml_benar = count($frekuensi);
            // $jml_soal = count($tangkap_twk);
            // $jml_salah = $jml_soal - $jml_benar;
            // $skor = ($jml_soal - $jml_salah) * 100;
            // $simpan_jawaban = Simpanjawaban::where('banksoal_id', $item->id)
            //     ->where('subkategori_id', 1)
            //     ->update([
            //         'frekuensi' => $jml_benar,
            //         'skor' => $skor,
            //     ]);
        }
        dd($jml_benar);



        if ($request->ajax()) {
            return DataTables::of($data)
                ->addColumn('paket_id', function ($row) {
                    if ($row->paket->judul) {
                        return $row->paket->judul;
                    } else {
                        return '';
                    }
                })
                ->addColumn('tgl_kerja', function ($row) {
                    if ($row->simpanjawaban->created_at) {
                        return \Carbon\Carbon::parse($row->simpanjawaban->created_at)->format('d F Y');
                    } else {
                        return '';
                    }
                })
                ->addColumn('twk', function ($row) {
                    return '0';
                })
                ->addColumn('tiu', function ($row) {
                    return '0';
                })
                ->addColumn('tkp', function ($row) {
                    return '0';
                })
                ->addColumn('skor', function ($row) {
                    return '0';
                })
                ->addColumn('pembahasan', function ($row) {
                    return '<a href="" class="btn btn-sm btn-primary">Detail</a>';
                })
                ->addColumn('lulus', function ($row) {
                    return '<div class="badge badge-light-success">Lulus</div>';
                })
                ->rawColumns(['pembahasan', 'lulus'])
                ->make(true);
        }
        return view('hasil.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
