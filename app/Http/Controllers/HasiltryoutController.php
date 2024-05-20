<?php

namespace App\Http\Controllers;

use App\Models\Banksoal;
use App\Models\Hasil;
use App\Models\Jawaban;
use App\Models\Paketsaya;
use Illuminate\Http\Request;
use App\Models\Simpanjawaban;
use App\Models\Simpanjawabansubmit;
use App\Models\Tampungsoal;
use App\Models\Togratis;
use Yajra\DataTables\Facades\DataTables;

class HasiltryoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = Hasil::where('user_id', auth()->user()->id)
            ->orderBy('created_at', 'desc')
            ->get();

        // Passing Grade
        $grade_twk = 65;
        $grade_tiu = 80;
        $grade_tkp = 166;

        // test twk
        // $this->total_nilai(2, 6, 3, 1, 'Y93ZZeOcPM13');
        // dd($this->total_nilai(2, 6, 3, 1, 'Y93ZZeOcPM13'));

        if ($request->ajax()) {
            return DataTables::of($data)
                ->addColumn('paket_id', function ($row) {
                    if ($row->paketsaya->paket->tampungpaket->subpaket->judul) {
                        return $row->paketsaya->paket->tampungpaket->subpaket->judul;
                    } else {
                        return '';
                    }
                })
                ->addColumn('tgl_kerja', function ($row) {
                    if ($row->paketsaya->simpanjawabansubmit) {
                        return \Carbon\Carbon::parse($row->paketsaya->simpanjawabansubmit->created_at)->format('d F Y');
                    } else {
                        return '';
                    }
                })
                ->addColumn('twk', function ($row) {
                    return $this->total_nilai($row->paketsaya->id, $row->paketsaya->paket->tampungpaket->subpaket_id, $row->paketsaya->status, 1, $row->kode_submit);
                })
                ->addColumn('tiu', function ($row) {
                    return $this->total_nilai($row->paketsaya->id, $row->paketsaya->paket->tampungpaket->subpaket_id, $row->paketsaya->status, 2, $row->kode_submit);
                })
                ->addColumn('tkp', function ($row) {
                    return $this->total_nilai($row->paketsaya->id, $row->paketsaya->paket->tampungpaket->subpaket_id, $row->paketsaya->status, 3, $row->kode_submit);
                })
                ->addColumn('min_grade', function () {
                    return 311;
                })
                ->addColumn('skor', function ($row) {
                    return $this->total_nilai($row->paketsaya->id, $row->paketsaya->paket->tampungpaket->subpaket_id, $row->paketsaya->status, 1, $row->kode_submit) + $this->total_nilai($row->paketsaya->id, $row->paketsaya->paket->tampungpaket->subpaket_id, $row->paketsaya->status, 2, $row->kode_submit) + $this->total_nilai($row->paketsaya->id, $row->paketsaya->paket->tampungpaket->subpaket_id, $row->paketsaya->status, 3, $row->kode_submit);
                })
                ->addColumn('pembahasan', function ($row) {
                    $url = url("hasil/pembahasan/" . $row->paketsaya->paket->tampungpaket->subpaket_id) . "/" . $row->paketsaya->paket_id . "/" . $row->kode_submit;
                    return "<a href=\"$url\" class=\"btn btn-sm btn-primary\">Detail</a>";
                })
                ->addColumn('lulus', function ($row) use ($grade_twk, $grade_tiu, $grade_tkp) {
                    $lulus_twk = $this->total_nilai($row->paketsaya->id, $row->paketsaya->paket->tampungpaket->subpaket_id, $row->paketsaya->status, 1, $row->kode_submit) >= $grade_twk ? 1 : 0;
                    $lulus_tiu = $this->total_nilai($row->paketsaya->id, $row->paketsaya->paket->tampungpaket->subpaket_id, $row->paketsaya->status, 2, $row->kode_submit) >= $grade_tiu ? 1 : 0;
                    $lulus_tkp = $this->total_nilai($row->paketsaya->id, $row->paketsaya->paket->tampungpaket->subpaket_id, $row->paketsaya->status, 3, $row->kode_submit) >= $grade_tkp ? 1 : 0;
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

    public function total_nilai($paketsaya_id, $subpaket_id, $status, $subkategori_id, $kode_submit)
    {
        // if ($status == 3) {
        //     // $soal = Togratis::where('subkategori_id', $subkategori_id)->get();
        //     $soal = Tampungsoal::where('subpaket_id', $subpaket_id)
        //         ->orderBy('togratis_id', 'asc')
        //         ->get();

        //     $tangkap = array();
        //     foreach ($soal as $item) {
        //         $simpan_jawaban = Simpanjawabansubmit::where('user_id', auth()->user()->id)
        //             ->where('togratis_id', $item->togratis_id)
        //             ->where('paketsaya_id', $paketsaya_id)
        //             ->where('subpaket_id', $subpaket_id)
        //             ->where('subkategori_id', $subkategori_id)
        //             ->where('kode_submit', $kode_submit)
        //             ->get();

        //         if (!$simpan_jawaban->isEmpty()) {
        //             $tangkap[] = $simpan_jawaban;
        //         }
        //     }
        // } else {

        // $soal = Banksoal::where('subkategori_id', $subkategori_id)->get();
        $soal = Tampungsoal::where('subpaket_id', $subpaket_id)
            ->orderBy('banksoal_id', 'asc')
            ->get();
        // dd($soal);

        $tangkap = array();
        foreach ($soal as $item) {
            $simpan_jawaban = Simpanjawabansubmit::where('user_id', auth()->user()->id)
                ->where('banksoal_id', $item->banksoal_id)
                ->where('paketsaya_id', $paketsaya_id)
                ->where('subpaket_id', $subpaket_id)
                ->where('subkategori_id', $subkategori_id)
                ->where('kode_submit', $kode_submit)
                ->get();

            if (!$simpan_jawaban->isEmpty()) {
                $tangkap[] = $simpan_jawaban;
            }
        }
        // }


        $jawabnya = array();
        for ($i = 0; $i < count($tangkap); $i++) {
            $jawabnya[] = $tangkap[$i][0]->jawab;
        }

        $pilihan_a = array();
        $pilihan_b = array();
        $pilihan_c = array();
        $pilihan_d = array();
        $pilihan_e = array();
        $jawaban_a = array();
        $jawaban_b = array();
        $jawaban_c = array();
        $jawaban_d = array();
        $jawaban_e = array();

        // if ($status == 3) {
        //     for ($i = 0; $i < count($tangkap); $i++) {
        //         $pilihan_a[] = $tangkap[$i][0]->jawabangratis->pilihan_a;
        //         $pilihan_b[] = $tangkap[$i][0]->jawabangratis->pilihan_b;
        //         $pilihan_c[] = $tangkap[$i][0]->jawabangratis->pilihan_c;
        //         $pilihan_d[] = $tangkap[$i][0]->jawabangratis->pilihan_d;
        //         $pilihan_e[] = $tangkap[$i][0]->jawabangratis->pilihan_e;

        //         $jawaban_a[] = $tangkap[$i][0]->jawabangratis->jawaban_a;
        //         $jawaban_b[] = $tangkap[$i][0]->jawabangratis->jawaban_b;
        //         $jawaban_c[] = $tangkap[$i][0]->jawabangratis->jawaban_c;
        //         $jawaban_d[] = $tangkap[$i][0]->jawabangratis->jawaban_d;
        //         $jawaban_e[] = $tangkap[$i][0]->jawabangratis->jawaban_e;
        //     }
        // } else {
        for ($i = 0; $i < count($tangkap); $i++) {
            $pilihan_a[] = $tangkap[$i][0]->jawaban->pilihan_a;
            $pilihan_b[] = $tangkap[$i][0]->jawaban->pilihan_b;
            $pilihan_c[] = $tangkap[$i][0]->jawaban->pilihan_c;
            $pilihan_d[] = $tangkap[$i][0]->jawaban->pilihan_d;
            $pilihan_e[] = $tangkap[$i][0]->jawaban->pilihan_e;

            $jawaban_a[] = $tangkap[$i][0]->jawaban->jawaban_a;
            $jawaban_b[] = $tangkap[$i][0]->jawaban->jawaban_b;
            $jawaban_c[] = $tangkap[$i][0]->jawaban->jawaban_c;
            $jawaban_d[] = $tangkap[$i][0]->jawaban->jawaban_d;
            $jawaban_e[] = $tangkap[$i][0]->jawaban->jawaban_e;
        }
        // }

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
