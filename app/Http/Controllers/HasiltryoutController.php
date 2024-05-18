<?php

namespace App\Http\Controllers;

use App\Models\Banksoal;
use App\Models\Hasil;
use App\Models\Jawaban;
use App\Models\Paketsaya;
use Illuminate\Http\Request;
use App\Models\Simpanjawaban;
use App\Models\Simpanjawabansubmit;
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

<<<<<<< HEAD
        // $soal_twk = Banksoal::where('subkategori_id', 1)->get();
        // $soal_tiu = Banksoal::where('subkategori_id', 2)->get();
        // $soal_tkp = Banksoal::where('subkategori_id', 3)->get();

        // $tangkap_twk = array();
        // foreach ($soal_twk as $item) {
        //     $simpan_jawaban_twk = Simpanjawaban::where('banksoal_id', $item->id)
        //         ->where('subkategori_id', 1)
        //         ->first()->jawab;
        //     $tangkap_twk[] = $simpan_jawaban_twk;

        //     $jawaban = Jawaban::where('bank_soal_id', $item->id)->get();
        //     $tangkap_jawaban = array();
        //     foreach ($jawaban as $key => $value) {
        //         $tangkap_jawaban[] = $value->pilihan_a;
        //         $tangkap_jawaban[] = $value->pilihan_b;
        //         $tangkap_jawaban[] = $value->pilihan_c;
        //         $tangkap_jawaban[] = $value->pilihan_d;
        //     }

        //     $hasil = array_intersect($tangkap_twk, $tangkap_jawaban);
        //     $frekuensi_a = Jawaban::where('pilihan_a', $hasil)->whereNotNull('jawaban_a')->value('jawaban_a');
        //     $frekuensi_b = Jawaban::where('pilihan_b', $hasil)->whereNotNull('jawaban_b')->value('jawaban_b');
        //     $frekuensi_c = Jawaban::where('pilihan_c', $hasil)->whereNotNull('jawaban_c')->value('jawaban_c');
        //     $frekuensi_d = Jawaban::where('pilihan_d', $hasil)->whereNotNull('jawaban_d')->value('jawaban_d');

        //     $frekuensi = array();
        //     $frekuensi[] = $frekuensi_a;
        //     $frekuensi[] = $frekuensi_b;
        //     $frekuensi[] = $frekuensi_c;
        //     $frekuensi[] = $frekuensi_d;
        //     $jml_benar = count($frekuensi);
        //     // $jml_soal = count($tangkap_twk);
        //     // $jml_salah = $jml_soal - $jml_benar;
        //     // $skor = ($jml_soal - $jml_salah) * 100;
        //     // $simpan_jawaban = Simpanjawaban::where('banksoal_id', $item->id)
        //     //     ->where('subkategori_id', 1)
        //     //     ->update([
        //     //         'frekuensi' => $jml_benar,
        //     //         'skor' => $skor,
        //     //     ]);
        // }
        // dd($jml_benar);
        // twk
        // $nilai_twk = $this->total_nilai(1);

        // // tiu
        // $nilai_tiu = $this->total_nilai(2);

        // // tkp
        // $nilai_tkp = $this->total_nilai(3);

        // skor


        // lulus
=======
        // Passing Grade
>>>>>>> be48162340adc7ae4809344dd7a95c1687476fda
        $grade_twk = 65;
        $grade_tiu = 80;
        $grade_tkp = 166;

        // $this->total_nilai(6, 3, 1);


        if ($request->ajax()) {
            return DataTables::of($data)
                ->addColumn('paket_id', function ($row) {
                    if ($row->paketsaya->paket->judul) {
                        return $row->paketsaya->paket->judul;
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
                    return $this->total_nilai($row->paketsaya->id, $row->paketsaya->status, 1, $row->kode_submit);
                })
                ->addColumn('tiu', function ($row) {
                    return $this->total_nilai($row->paketsaya->id, $row->paketsaya->status, 2, $row->kode_submit);
                })
                ->addColumn('tkp', function ($row) {
                    return $this->total_nilai($row->paketsaya->id, $row->paketsaya->status, 3, $row->kode_submit);
                })
                ->addColumn('skor', function ($row) {
                    return $this->total_nilai($row->paketsaya->id, $row->paketsaya->status, 1, $row->kode_submit) + $this->total_nilai($row->paketsaya->id, $row->paketsaya->status, 2, $row->kode_submit) + $this->total_nilai($row->paketsaya->id, $row->paketsaya->status, 3, $row->kode_submit);
                })
                ->addColumn('pembahasan', function ($row) {
                    $url = url("hasil/pembahasan/" . $row->paketsaya->paket->kategori_id) . "/" . $row->paketsaya->paket_id . "/" . $row->kode_submit;
                    return "<a href=\"$url\" class=\"btn btn-sm btn-primary\">Detail</a>";
                })
                ->addColumn('lulus', function ($row) use ($grade_twk, $grade_tiu, $grade_tkp) {
                    $lulus_twk = $this->total_nilai($row->paketsaya->id, $row->paketsaya->status, 1, $row->kode_submit) >= $grade_twk ? 1 : 0;
                    $lulus_tiu = $this->total_nilai($row->paketsaya->id, $row->paketsaya->status, 2, $row->kode_submit) >= $grade_tiu ? 1 : 0;
                    $lulus_tkp = $this->total_nilai($row->paketsaya->id, $row->paketsaya->status, 3, $row->kode_submit) >= $grade_tkp ? 1 : 0;
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

    public function total_nilai($paketsaya_id, $status, $subkategori_id, $kode_submit)
    {
        if ($status == 3) {
            $soal = Togratis::where('subkategori_id', $subkategori_id)->get();
            $tangkap = array();
            foreach ($soal as $item) {
                $simpan_jawaban = Simpanjawabansubmit::where('user_id', auth()->user()->id)
                    ->where('togratis_id', $item->id)
                    ->where('paketsaya_id', $paketsaya_id)
                    ->where('subkategori_id', $subkategori_id)
                    ->where('kode_submit', $kode_submit)
                    ->get();

                if (!$simpan_jawaban->isEmpty()) {
                    $tangkap[] = $simpan_jawaban;
                }
            }
        } else {
            $soal = Banksoal::where('subkategori_id', $subkategori_id)->get();
            $tangkap = array();
            foreach ($soal as $item) {
                $simpan_jawaban = Simpanjawabansubmit::where('user_id', auth()->user()->id)
                    ->where('banksoal_id', $item->id)
                    ->where('paketsaya_id', $paketsaya_id)
                    ->where('subkategori_id', $subkategori_id)
                    ->where('kode_submit', $kode_submit)
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
        $pilihan_e = array();
        $jawaban_a = array();
        $jawaban_b = array();
        $jawaban_c = array();
        $jawaban_d = array();
        $jawaban_e = array();

        if ($status == 3) {
            for ($i = 0; $i < count($tangkap); $i++) {
                $pilihan_a[] = $tangkap[$i][0]->jawabangratis->pilihan_a;
                $pilihan_b[] = $tangkap[$i][0]->jawabangratis->pilihan_b;
                $pilihan_c[] = $tangkap[$i][0]->jawabangratis->pilihan_c;
                $pilihan_d[] = $tangkap[$i][0]->jawabangratis->pilihan_d;
                $pilihan_e[] = $tangkap[$i][0]->jawabangratis->pilihan_e;

                $jawaban_a[] = $tangkap[$i][0]->jawabangratis->jawaban_a;
                $jawaban_b[] = $tangkap[$i][0]->jawabangratis->jawaban_b;
                $jawaban_c[] = $tangkap[$i][0]->jawabangratis->jawaban_c;
                $jawaban_d[] = $tangkap[$i][0]->jawabangratis->jawaban_d;
                $jawaban_e[] = $tangkap[$i][0]->jawabangratis->jawaban_e;
            }
        } else {
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
