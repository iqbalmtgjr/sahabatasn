<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Banksoal;
use App\Models\Hasil;
use App\Models\Paketsaya;
use App\Models\Simpanjawaban;
use App\Models\Togratis;
use App\Models\User;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Request;

class Kerjakan extends Component
{
    public $datas, $jawaban, $jawabann, $jawabanTersimpan, $step, $paketSaya, $totalSteps, $paketId, $status, $startTime;
    public $currentStep = 1;

    #[On('pageChanged')]
    public function mount($id, $paket_id)
    {
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

        $this->status = $this->paketSaya->status;

        if ($this->status == 3) {
            $this->datas = Togratis::where('kategori_id', $id)->get();
        } else {
            $this->datas = Banksoal::where('kategori_id', $id)->get();
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
        $this->dispatch('pageChanged', $this->getSoal()->kategori_id, $this->getPaket()->paket_id);
    }

    public function previousStep()
    {
        $this->currentStep--;
        $this->startTime = now();
        $this->dispatch('pageChanged', $this->getSoal()->kategori_id, $this->getPaket()->paket_id);
    }

    public function setStep($step)
    {
        $this->startTime = now();
        $this->currentStep = $step;
        $this->dispatch('pageChanged', $this->getSoal()->kategori_id, $this->getPaket()->paket_id);
    }

    public function getSoal()
    {
        return $this->datas[$this->currentStep - 1];
    }
    public function getPaket()
    {
        return $this->paketSaya;
    }

    public function simpan($value, $jawaban_id)
    {
        $endTime = now();
        $hours = $endTime->diff($this->startTime)->format('%h');
        $minutes = $endTime->diff($this->startTime)->format('%i');
        $seconds = $endTime->diff($this->startTime)->format('%s');
        $duration = $minutes . ' menit ' . $seconds . ' detik';

        // dd($duration);
        $paket_gue = Paketsaya::where('user_id', auth()->user()->id)
            ->where('paket_id', $this->paketId)->first();

        if ($paket_gue->status == 3) {
            $datay = Simpanjawaban::where('user_id', auth()->user()->id)
                ->where('togratis_id', $this->getSoal()->id)
                ->where('subkategori_id', $this->getSoal()->subkategori_id)
                ->first();

            if ($datay) {
                $datay->update([
                    'user_id' => auth()->user()->id,
                    'paketsaya_id' => $this->getPaket()->id,
                    'togratis_id' => $this->getSoal()->id,
                    'subkategori_id' => $this->getSoal()->subkategori_id,
                    'jawabangratis_id' => $jawaban_id,
                    'jawab' => $value,
                    'lama_pengerjaan' => $duration,
                ]);
            } else {
                Simpanjawaban::create([
                    'user_id' => auth()->user()->id,
                    'paketsaya_id' => $this->getPaket()->id,
                    'togratis_id' => $this->getSoal()->id,
                    'subkategori_id' => $this->getSoal()->subkategori_id,
                    'jawabangratis_id' => $jawaban_id,
                    'jawab' => $value,
                    'lama_pengerjaan' => $duration,
                ]);
            }
        } else {
            $datay = Simpanjawaban::where('user_id', auth()->user()->id)
                ->where('banksoal_id', $this->getSoal()->id)
                ->where('subkategori_id', $this->getSoal()->kategori_id)
                ->first();

            if ($datay) {
                $datay->update([
                    'user_id' => auth()->user()->id,
                    'paketsaya_id' => $this->getPaket()->id,
                    'banksoal_id' => $this->getSoal()->id,
                    'subkategori_id' => $this->getSoal()->subkategori_id,
                    'jawaban_id' => $jawaban_id,
                    'jawab' => $value,
                    'lama_pengerjaan' => $duration
                ]);
            } else {
                Simpanjawaban::create([
                    'user_id' => auth()->user()->id,
                    'paketsaya_id' => $this->getPaket()->id,
                    'banksoal_id' => $this->getSoal()->id,
                    'subkategori_id' => $this->getSoal()->subkategori_id,
                    'jawaban_id' => $jawaban_id,
                    'jawab' => $value,
                    'lama_pengerjaan' => $duration
                ]);
            }
        }



        $this->startTime = now();
        // toastr()->success('Jawaban berhasil disimpan', 'Berhasil');

        $this->dispatch('pageChanged', $this->getSoal()->kategori_id, $this->getPaket()->paket_id);
    }

    public function submit()
    {
        $jawab_submit = Simpanjawaban::where('user_id', auth()->user()->id)
            ->where('paketsaya_id', $this->getPaket()->id)
            ->get();

        $jawab_belum_submit = $this->datas->whereNotIn('id', $jawab_submit->pluck('banksoal_id'));

        if ($jawab_submit->count() != $this->totalSteps) {
            foreach ($jawab_belum_submit as $value) {
                //simpan jawaban yang tidak diisikan
                Simpanjawaban::create([
                    'user_id' => auth()->user()->id,
                    'banksoal_id' => $value->id,
                    'paketsaya_id' => $this->getPaket()->id,
                    'subkategori_id' => $value->subkategori_id,
                    'jawaban_id' => $value->jawaban->id,
                    'jawab' => null,
                    'lama_pengerjaan' => null,
                ]);
            }
        }
        // $this->paketSaya->update([
        //     'submit' => 1,
        // ]);

        $hasil = Hasil::create([
            'user_id' => auth()->user()->id,
            'paketsaya_id' => $this->getPaket()->id,
            'simpanjawaban_id' => $jawab_submit->pluck('id'),
        ]);

        return redirect('hasil');
    }

    public function delete($id)
    {
        if ($id) {
            Simpanjawaban::find($id)->delete();
            $this->dispatch('pageChanged', $this->getSoal()->subkategori_id, $this->getPaket()->paket_id);
        }
    }
}
