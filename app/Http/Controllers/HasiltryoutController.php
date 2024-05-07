<?php

namespace App\Http\Controllers;

use App\Models\Banksoal;
use App\Models\Jawaban;
use App\Models\Paketsaya;
use Illuminate\Http\Request;
use App\Models\Simpanjawaban;
use App\Models\Togratis;
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
        // dd($data);

        // twk
        // $nilai_twk = $this->total_nilai(1);

        // // tiu
        // $nilai_tiu = $this->total_nilai(2);

        // // tkp
        // $nilai_tkp = $this->total_nilai(3);

        // skor


        // lulus
        $grade_twk = 65;
        $grade_tiu = 80;
        $grade_tkp = 166;


        // if ($lulus_twk == 1 && $lulus_tiu == 1 && $lulus_tkp == 1) {
        //     $lulus = '<div class="badge badge-light-success">Lulus</div>';
        // } else {
        //     $lulus = '<div class="badge badge-light-danger">Tidak Lulus</div>';
        // }
        $this->total_nilai(6, 3, 1);


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
                    } else {
                        return '';
                    }
                })
                ->addColumn('twk', function ($row) {
                    return $this->total_nilai($row->id, $row->status, 1);
                })
                ->addColumn('tiu', function ($row) {
                    return $this->total_nilai($row->id, $row->status, 2);
                })
                ->addColumn('tkp', function ($row) {
                    return $this->total_nilai($row->id, $row->status, 3);
                })
                ->addColumn('skor', function ($row) {
                    return $this->total_nilai($row->id, $row->status, 1) + $this->total_nilai($row->id, $row->status, 2) + $this->total_nilai($row->id, $row->status, 3);
                })
                ->addColumn('pembahasan', function ($row) {
                    $url = url("hasil/pembahasan/" . $row->paket->kategori_id) . "/" . $row->paket_id;
                    return "<a href=\"$url\" class=\"btn btn-sm btn-primary\">Detail</a>";
                })
                ->addColumn('lulus', function ($row) use ($grade_twk, $grade_tiu, $grade_tkp) {
                    $lulus_twk = $this->total_nilai($row->id, $row->status, 1) >= $grade_twk ? 1 : 0;
                    $lulus_tiu = $this->total_nilai($row->id, $row->status, 2) >= $grade_tiu ? 1 : 0;
                    $lulus_tkp = $this->total_nilai($row->id, $row->status, 3) >= $grade_tkp ? 1 : 0;
                    if ($lulus_twk == 1 && $lulus_tiu == 1 && $lulus_tkp == 1) {
                        return '<div class="badge badge-light-success">Lulus</div>';
                    } else {
                        return '<div class="badge badge-light-danger">Tidak Lulus</div>';
                    }
                })
                ->rawColumns(['pembahasan', 'lulus'])
                ->make(true);
        }
        return view('hasil.index');
    }

    public function total_nilai($paketsaya_id, $status, $subkategori_id)
    {
        if ($status == 3) {
            $soal = Togratis::where('subkategori_id', $subkategori_id)->get();
            $tangkap = array();
            foreach ($soal as $item) {
                $simpan_jawaban = Simpanjawaban::where('user_id', auth()->user()->id)
                    ->where('togratis_id', $item->id)
                    ->where('paketsaya_id', $paketsaya_id)
                    ->where('subkategori_id', $subkategori_id)
                    ->get();

                if (!$simpan_jawaban->isEmpty()) {
                    $tangkap[] = $simpan_jawaban;
                }
            }
        } else {
            $soal = Banksoal::where('subkategori_id', $subkategori_id)->get();
            $tangkap = array();
            foreach ($soal as $item) {
                $simpan_jawaban = Simpanjawaban::where('user_id', auth()->user()->id)
                    ->where('banksoal_id', $item->id)
                    ->where('paketsaya_id', $paketsaya_id)
                    ->where('subkategori_id', $subkategori_id)
                    ->get();

                if (!$simpan_jawaban->isEmpty()) {
                    $tangkap[] = $simpan_jawaban;
                }
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

        if ($status == 3) {
            for ($i = 0; $i < count($tangkap); $i++) {
                $pilihan_a[] = $tangkap[$i][0]->jawabangratis->pilihan_a;
                $pilihan_b[] = $tangkap[$i][0]->jawabangratis->pilihan_b;
                $pilihan_c[] = $tangkap[$i][0]->jawabangratis->pilihan_c;
                $pilihan_d[] = $tangkap[$i][0]->jawabangratis->pilihan_d;

                $jawaban_a[] = $tangkap[$i][0]->jawabangratis->jawaban_a;
                $jawaban_b[] = $tangkap[$i][0]->jawabangratis->jawaban_b;
                $jawaban_c[] = $tangkap[$i][0]->jawabangratis->jawaban_c;
                $jawaban_d[] = $tangkap[$i][0]->jawabangratis->jawaban_d;
            }
        } else {
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
