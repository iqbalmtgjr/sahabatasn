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

        // twk
        $nilai_twk = $this->total_nilai(1);

        // tiu
        $nilai_tiu = $this->total_nilai(2);

        // tkp
        $nilai_tkp = $this->total_nilai(3);

        // skor
        $skor = $nilai_twk + $nilai_tiu + $nilai_tkp;


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
                    if ($row->simpanjawaban) {
                        return \Carbon\Carbon::parse($row->simpanjawaban->created_at)->format('d F Y');
                        // return $row->simpanjawaban;
                    } else {
                        return '';
                    }
                })
                ->addColumn('twk', function ($row) use ($nilai_twk) {
                    return $nilai_twk;
                })
                ->addColumn('tiu', function ($row) use ($nilai_tiu) {
                    return $nilai_tiu;
                })
                ->addColumn('tkp', function ($row) use ($nilai_tkp) {
                    return $nilai_tkp;
                })
                ->addColumn('skor', function ($row) use ($skor) {
                    return $skor;
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

    public function total_nilai($subkategori_id)
    {
        $soal = Banksoal::where('subkategori_id', $subkategori_id)->get();
        $tangkap = array();
        foreach ($soal as $item) {
            $simpan_jawaban = Simpanjawaban::where('user_id', auth()->user()->id)
                ->where('banksoal_id', $item->id)
                ->where('subkategori_id', $subkategori_id)
                ->get();

            if (!$simpan_jawaban->isEmpty()) {
                $tangkap[] = $simpan_jawaban;
            }
        }

        $jawabnya = array();
        for ($i = 0; $i < count($tangkap); $i++) {
            $jawabnya[] = $tangkap[$i][0]->jawab;
        }

        $pilihan_a = array();
        $pilihan_b = array();
        $pilihan_c = array();
        $pilihan_d = array();
        $jawaban_a = array();
        $jawaban_b = array();
        $jawaban_c = array();
        $jawaban_d = array();
        for ($i = 0; $i < count($tangkap); $i++) {
            $pilihan_a[] = $tangkap[$i][0]->jawaban->pilihan_a;
            $pilihan_b[] = $tangkap[$i][0]->jawaban->pilihan_b;
            $pilihan_c[] = $tangkap[$i][0]->jawaban->pilihan_c;
            $pilihan_d[] = $tangkap[$i][0]->jawaban->pilihan_d;

            $jawaban_a[] = $tangkap[$i][0]->jawaban->jawaban_a;
            $jawaban_b[] = $tangkap[$i][0]->jawaban->jawaban_b;
            $jawaban_c[] = $tangkap[$i][0]->jawaban->jawaban_c;
            $jawaban_d[] = $tangkap[$i][0]->jawaban->jawaban_d;
        }

        $hasils = [];

        foreach ($jawabnya as $key => $value) {
            $hsl_a = array_intersect([$jawabnya[$key]], $pilihan_a);
            $hsl_b = array_intersect([$jawabnya[$key]], $pilihan_b);
            $hsl_c = array_intersect([$jawabnya[$key]], $pilihan_c);
            $hsl_d = array_intersect([$jawabnya[$key]], $pilihan_d);
            if (!empty($hsl_a)) {
                $hasils[] = $jawaban_a[$key];
            } elseif (!empty($hsl_b)) {
                $hasils[] = $jawaban_b[$key];
            } elseif (!empty($hsl_c)) {
                $hasils[] = $jawaban_c[$key];
            } elseif (!empty($hsl_d)) {
                $hasils[] = $jawaban_d[$key];
            } else {
                $hasils[] = 0;
            }
        }
        return array_sum($hasils);
    }
}
