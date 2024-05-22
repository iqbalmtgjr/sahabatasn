<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\Hasil;
use Livewire\Component;
use App\Models\Banksoal;
use App\Models\Togratis;
use App\Models\Paketsaya;
use Illuminate\Support\Str;
use Livewire\Attributes\On;
use App\Models\Simpanjawaban;
use App\Models\Simpanjawabansubmit;
use App\Models\Subpaket;
use App\Models\Tampungpaket;
use App\Models\Tampungsoal;
use Illuminate\Support\Facades\Request;

class Kerjakan extends Component
{
    public $datas, $jawaban, $jawabann, $jawabanTersimpan, $step, $paketSaya, $totalSteps, $paketId, $status, $startTime, $subPaketSaya;
    public $currentStep = 1;

    #[On('pageChanged')]
    public function mount($paket_id, $subpaket_id)
    {
        // dd($this->paketSaya);
        $this->startTime = now();
        $admin = User::where('role', 'admin')->get();
        $tangkap_id = array();
        foreach ($admin as $value) {
            $tangkap_id[] = $value->id;
            $tangkap_id[] = auth()->user()->id;
        }

        // dd($tangkap_id);
        $this->paketSaya = Paketsaya::whereIn('user_id', $tangkap_id)
            ->where('paket_id', $paket_id)->first();

        $this->subPaketSaya = $subpaket_id;

        $this->status = $this->paketSaya->status;

        // if ($this->status == 3) {
        // $this->datas = Togratis::where('kategori_id', $id)->get();
        //     $this->datas = Tampungsoal::where('subpaket_id', $subpaket_id)
        //         ->orderBy('togratis_id', 'asc')
        //         ->get();
        // } else {
        // $this->datas = Banksoal::where('kategori_id', $id)->get();
        $this->datas = Tampungsoal::where('subpaket_id', $subpaket_id)
            ->orderBy('banksoal_id', 'asc')
            ->get();
        // }

        // dd($this->paketSaya->paket_id);
        if (!isset($this->datas[0]->banksoal)) {
            toastr('Paket Soal Belum Tersedia', 'warning');
            if ($this->status == 3) {
                return redirect('/togratis/' . $paket_id);
            } else {
                return redirect('/paketsaya/' . $paket_id);
            }
        }

        $this->paketId = $paket_id;
        $this->jawaban = Simpanjawaban::where('user_id', auth()->user()->id)
            ->where('subkategori_id', $this->getSoal()->subkategori_id)
            ->first();
        $this->jawabann = Simpanjawaban::where('user_id', auth()->user()->id)
            ->where('subkategori_id', $this->getSoal()->subkategori_id)
            ->get();

        $this->totalSteps = $this->datas->count();
        $this->currentStep;
    }

    public function render()
    {
        return view('livewire.kerjakan');
    }

    public function nextStep()
    {
        $this->currentStep++;
        $this->startTime = now();
        $this->dispatch('pageChanged', $this->paketSaya->paket_id, $this->subPaketSaya);
    }

    public function previousStep()
    {
        $this->currentStep--;
        $this->startTime = now();
        $this->dispatch('pageChanged', $this->paketSaya->paket_id, $this->subPaketSaya);
    }

    public function setStep($step)
    {
        $this->startTime = now();
        $this->currentStep = $step;
        $this->dispatch('pageChanged', $this->paketSaya->paket_id, $this->subPaketSaya);
    }

    public function getSoal()
    {
        // if ($this->status == 3) {
        //     return $this->datas[$this->currentStep - 1]->togratis;
        // } else {
        return $this->datas[$this->currentStep - 1]->banksoal;
        // }
    }

    public function simpan($value, $jawaban_id)
    {
        $endTime = now();
        $hours = $endTime->diff($this->startTime)->format('%h');
        $minutes = $endTime->diff($this->startTime)->format('%i');
        $seconds = $endTime->diff($this->startTime)->format('%s');
        $duration = $minutes . ' menit ' . $seconds . ' detik';

        // if ($paket_gue->status == 3) {
        //     $datay = Simpanjawaban::where('user_id', auth()->user()->id)
        //         ->where('togratis_id', $this->getSoal()->id)
        //         ->where('subkategori_id', $this->getSoal()->subkategori_id)
        //         ->first();

        //     if ($datay) {
        //         $datay->update([
        //             'jawab' => $value,
        //             'lama_pengerjaan' => $duration,
        //         ]);
        //     } else {
        //         Simpanjawaban::create([
        //             'user_id' => auth()->user()->id,
        //             'paketsaya_id' => $this->paketSaya->id,
        //             'subpaket_id' => $this->subPaketSaya,
        //             'togratis_id' => $this->getSoal()->id,
        //             'subkategori_id' => $this->getSoal()->subkategori_id,
        //             'jawabangratis_id' => $jawaban_id,
        //             'jawab' => $value,
        //             'lama_pengerjaan' => $duration,
        //         ]);
        //     }
        // } else {
        $datay = Simpanjawaban::where('user_id', auth()->user()->id)
            ->where('paketsaya_id', $this->paketSaya->id)
            ->where('banksoal_id', $this->getSoal()->id)
            // ->where('subkategori_id', $this->getSoal()->kategori_id)
            ->first();

        if ($datay) {
            $datay->update([
                // 'user_id' => auth()->user()->id,
                // 'paketsaya_id' => $this->paketSaya->id,
                // 'banksoal_id' => $this->getSoal()->id,
                // 'subkategori_id' => $this->getSoal()->subkategori_id,
                // 'jawaban_id' => $jawaban_id,
                'jawab' => $value,
                'lama_pengerjaan' => $duration
            ]);
        } else {
            Simpanjawaban::create([
                'user_id' => auth()->user()->id,
                'paketsaya_id' => $this->paketSaya->id,
                'subpaket_id' => $this->subPaketSaya,
                'banksoal_id' => $this->getSoal()->id,
                'subkategori_id' => $this->getSoal()->subkategori_id,
                'jawaban_id' => $jawaban_id,
                'jawab' => $value,
                'lama_pengerjaan' => $duration
            ]);
        }
        // }

        $this->startTime = now();
        // toastr()->success('Jawaban berhasil disimpan', 'Berhasil');

        $this->dispatch('pageChanged', $this->paketSaya->paket_id, $this->subPaketSaya);
    }

    public function submit()
    {
        $jawab_submit = Simpanjawaban::where('user_id', auth()->user()->id)
            ->where('paketsaya_id', $this->paketSaya->id)
            ->where('subpaket_id', $this->subPaketSaya)
            ->get();

        // dd($jawab_submit->pluck('banksoal_id'));

        $kode_submit = Str::random(10) . rand(0, 99);
        foreach ($jawab_submit as $item) {
            // if ($paket_gue->status == 3) {
            //     $simpan_submit = Simpanjawabansubmit::create([
            //         'kode_submit' => $kode_submit,
            //         'user_id' => $item->user_id,
            //         'togratis_id' => $item->togratis_id,
            //         'paketsaya_id' => $item->paketsaya_id,
            //         'subpaket_id' => $item->subpaket_id,
            //         'subkategori_id' => $item->subkategori_id,
            //         'jawabangratis_id' => $item->jawabangratis_id,
            //         'jawab' => $item->jawab,
            //         'lama_pengerjaan' => $item->lama_pengerjaan,
            //     ]);
            // } else {
            $simpan_submit = Simpanjawabansubmit::create([
                'kode_submit' => $kode_submit,
                'user_id' => $item->user_id,
                'banksoal_id' => $item->banksoal_id,
                'paketsaya_id' => $item->paketsaya_id,
                'subpaket_id' => $item->subpaket_id,
                'subkategori_id' => $item->subkategori_id,
                'jawaban_id' => $item->jawaban_id,
                'jawab' => $item->jawab,
                'lama_pengerjaan' => $item->lama_pengerjaan,
            ]);
            // }
        }

        // dd($simpan_submit);
        // if ($paket_gue->status == 3) {
        //     $jawab_belum_submit = Tampungsoal::where('subpaket_id', $simpan_submit->subpaket_id)->whereNotIn('togratis_id', $jawab_submit->pluck('togratis_id'))->get();
        // } else {
        $jawab_belum_submit = Tampungsoal::where('subpaket_id', $simpan_submit->subpaket_id)->whereNotIn('banksoal_id', $jawab_submit->pluck('banksoal_id'))->get();
        // }

        // dd($jawab_belum_submit);

        if ($jawab_submit->count() != $this->totalSteps) {
            foreach ($jawab_belum_submit as $value) {
                //simpan jawaban yang tidak diisikan
                // if ($paket_gue->status == 3) {
                //     $simpan_submit = Simpanjawabansubmit::create([
                //         'kode_submit' => $kode_submit,
                //         'user_id' => auth()->user()->id,
                //         'togratis_id' => $value->banksoal->id,
                //         'paketsaya_id' => $simpan_submit->paketsaya_id,
                //         'subpaket_id' => $simpan_submit->subpaket_id,
                //         'subkategori_id' => $value->banksoal->subkategori_id,
                //         'jawabangratis_id' => $value->banksoal->jawaban->id,
                //         'jawab' => null,
                //         'lama_pengerjaan' => null,
                //     ]);
                // } else {
                $simpan_submit = Simpanjawabansubmit::create([
                    'kode_submit' => $kode_submit,
                    'user_id' => auth()->user()->id,
                    'banksoal_id' => $value->banksoal_id,
                    'paketsaya_id' => $simpan_submit->paketsaya_id,
                    'subpaket_id' => $simpan_submit->subpaket_id,
                    'subkategori_id' => $value->banksoal->subkategori_id,
                    'jawaban_id' => $value->banksoal->jawaban->id,
                    'jawab' => null,
                    'lama_pengerjaan' => null,
                ]);
                // }
            }
        }

        $hasil = Hasil::create([
            'user_id' => auth()->user()->id,
            'kode_submit' => $kode_submit,
            'paketsaya_id' => $simpan_submit->paketsaya_id,
        ]);

        $delete_simpan_jawaban = Simpanjawaban::where('user_id', auth()->user()->id)
            ->where('paketsaya_id', $simpan_submit->paketsaya_id)
            ->delete();

        if ($this->paketSaya->paket->kategori_id == 1) {
            return redirect('hasil/skd');
        } else {
            return redirect('hasil/skb');
        }
    }

    public function delete($id)
    {
        if ($id) {
            Simpanjawaban::find($id)->delete();
            $this->dispatch('pageChanged', $this->getSoal()->subkategori_id, $this->paketSaya->paket_id);
        }
    }
}
