<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Banksoal;
use App\Models\Paket;
use App\Models\Paketsaya;
use App\Models\Simpanjawaban;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Request;

class Kerjakan extends Component
{
    public $datas, $jawaban, $jawabann, $jawabanTersimpan, $step, $paket, $totalSteps;
    public $currentStep = 1;

    #[On('pageChanged')]
    public function mount($id, $paket_id)
    {
        // dd($paket_id);
        $this->datas = Banksoal::where('subkategori_id', $id)->get();
        $this->paket = Paketsaya::where('user_id', auth()->user()->id)
            ->where('paket_id', $paket_id)->first()->paket;
        // dd($this->paket->waktu);
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
        return view('livewire.kerjakan2');
    }

    public function nextStep()
    {
        $this->currentStep++;
        $this->dispatch('pageChanged', $this->getSoal()->subkategori_id, $this->getPaket()->id);
    }

    public function previousStep()
    {
        $this->currentStep--;
        $this->dispatch('pageChanged', $this->getSoal()->subkategori_id, $this->getPaket()->id);
    }

    // public function goToStep($step, $subkategori_id)
    public function setStep($step)
    {
        // dd($step);
        $this->currentStep = $step;
        $this->dispatch('pageChanged', $this->getSoal()->subkategori_id, $this->getPaket()->id);
    }

    public function getSoal()
    {
        return $this->datas[$this->currentStep - 1];
    }
    public function getPaket()
    {
        return $this->paket;
    }

    public function simpan($value, $jawaban_id)
    {
        // dd($value, $jawaban_id);
        $datay = Simpanjawaban::where('user_id', auth()->user()->id)
            ->where('banksoal_id', $this->getSoal()->id)
            ->where('subkategori_id', $this->getSoal()->subkategori_id, $this->getPaket()->id)
            ->first();

        if ($datay) {
            $simpan = $datay->update([
                'user_id' => auth()->user()->id,
                'banksoal_id' => $this->getSoal()->id,
                'subkategori_id' => $this->getSoal()->subkategori_id,
                'jawaban_id' => $jawaban_id,
                'jawab' => $value,
            ]);
        } else {
            $simpan = Simpanjawaban::create([
                'user_id' => auth()->user()->id,
                'banksoal_id' => $this->getSoal()->id,
                'subkategori_id' => $this->getSoal()->subkategori_id,
                'jawaban_id' => $jawaban_id,
                'jawab' => $value,
            ]);
        }

        // toastr()->success('Jawaban berhasil disimpan', 'Berhasil');

        $this->dispatch('pageChanged', $this->getSoal()->subkategori_id, $this->getPaket()->id);
    }

    public function delete($id)
    {
        if ($id) {
            Simpanjawaban::find($id)->delete();
            $this->dispatch('pageChanged', $this->getSoal()->subkategori_id, $this->getPaket()->id);
        }
    }
}
